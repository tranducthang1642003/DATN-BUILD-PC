<?php

namespace Modules\Product\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;

class ProductControllerAdmin extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin - Sản phẩm';
        $statusCounts = [
            '1' => Product::where('status', 1)->count(),
            '2' => Product::where('status', 2)->count(),
            '3' => Product::where('status', 3)->count(),
            '4' => Product::count(),
        ];
        $productsQuery = Product::with('brand', 'category');
        $status = $request->input('status');
        if ($status) {
            $productsQuery->where('status', $status);
        }
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if ($startDate && $endDate) {
            $productsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('product_name', 'like', '%' . $keyword . '%');
        }
        $products = $productsQuery->paginate(10);
        $products_images = [];
        foreach ($products as $product) {
            if ($product->quantity === 0 && $product->status === 1) {
                $product->status = 2;
                $product->save();
            }
            $primary_image = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_url = $primary_image ? $primary_image->image_path : null;
            $secondary_images = ProductImage::where('product_id', $product->id)
                ->where('is_primary', 0)
                ->get();
            $products_images[$product->id] = [
                'primary_image' => $primary_image,
                'secondary_images' => $secondary_images,
            ];
        }
        return view('admin.product.product', compact('products', 'statusCounts', 'products_images', 'title'));
    }

    public function edit($id)
    {
        $title = 'Admin - Sản phẩm - Chỉnh sửa';
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::with('brand', 'category')->findOrFail($id);
        $productImages = $product->productImages()->orderBy('is_primary', 'desc')->get();
        $primaryImage = $productImages->where('is_primary', true)->first();
        $secondaryImages = $productImages->where('is_primary', false);
        return view('admin.product.edit', compact('product', 'brands', 'categories', 'primaryImage', 'secondaryImages', 'title'));
    }


    public function update_product(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'stock' => 'required|numeric',
            'sale' => 'required|in:0,1',
            'price_sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'specifications' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $product = Product::findOrFail($id);
            $product->product_name = $request->input('product_name');
            $product->slug = Str::slug($request->input('product_name'), '-');
            $product->product_code = $request->input('product_code');
            $product->color = $request->input('color');
            $product->quantity = $request->input('quantity');
            $product->stock = $request->input('stock');
            $product->sale = $request->input('sale');
            $product->price_sale = $request->input('price_sale');
            $product->featured = $request->input('featured') === 'yes';
            $product->status = $request->input('status');
            $product->category_id = $request->input('category_id');
            $product->brand_id = $request->input('brand_id');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->specifications = $request->input('specifications');
            $product->save();
            if ($request->hasFile('image')) {
                $imagePrimary = $request->file('image');
                $imagePrimaryName = time() . '_' . $imagePrimary->getClientOriginalName();
                $imagePrimary->move(public_path('images'), $imagePrimaryName);
                $imagePrimaryPath = 'images/' . $imagePrimaryName;
                if ($product->primaryImage) {
                    Storage::disk('public')->delete($product->primaryImage->image_path);
                    $product->primaryImage->image_path = $imagePrimaryPath;
                    $product->primaryImage->save();
                } else {
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image_path = $imagePrimaryPath;
                    $productImage->is_primary = true;
                    $productImage->save();
                }
            }
            $imageSecondaryPaths = [];
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    $imageSecondaryName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageSecondaryName);
                    $imageSecondaryPath = 'images/' . $imageSecondaryName;
                    $secondaryImage = new ProductImage();
                    $secondaryImage->product_id = $product->id;
                    $secondaryImage->image_path = $imageSecondaryPath;
                    $secondaryImage->is_primary = false;
                    $secondaryImage->save();
                    $imageSecondaryPaths[] = $imageSecondaryPath;
                }
            }
            if (!empty($product->additionalImages)) {
                foreach ($product->additionalImages as $image) {
                    if (!in_array($image->image_path, $imageSecondaryPaths)) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                }
            }
            return redirect()->route('product')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('error', 'Cập nhật sản phẩm thất bại.');
        }
    }
    public function add()
    {
        $title = 'Admin - Sản phẩm - Thêm mới';
        $brands = Brand::All();
        $categories = Category::all();
        $product = Product::with('brand', 'category', 'image');
        return view('admin.product.add', compact('product', 'brands', 'categories', 'title'));
    }
    public function add_product(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'stock' => 'required|numeric',
            'sale' => 'required|in:0,1',
            'price_sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'specifications' => 'nullable',
            'image_primary' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
            'image_secondary.*' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePrimary = $request->file('image_primary');
        $imagePrimaryName = time() . '_' . $imagePrimary->getClientOriginalName();
        $imagePrimary->move(public_path('images'), $imagePrimaryName);
        $imagePrimaryPath = 'images/' . $imagePrimaryName;

        $imageSecondaryPaths = [];
        if ($request->hasFile('image_secondary')) {
            foreach ($request->file('image_secondary') as $image) {
                $imageSecondaryName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageSecondaryName);
                $imageSecondaryPaths[] = 'images/' . $imageSecondaryName;
            }
        }
        try {
            $product = new Product();
            $product->product_name = $request->input('product_name');
            $product->slug = Str::slug($request->input('product_name'), '-');
            $product->product_code = $request->input('product_code');
            $product->color = $request->input('color');
            $product->quantity = $request->input('quantity');
            $product->stock = $request->input('stock');
            $product->price_sale = $request->input('price_sale');
            $product->sale = $request->input('sale');
            $product->featured = $request->input('featured') === 'yes';
            $product->status = $request->input('status');
            $product->category_id = $request->input('category_id');
            $product->brand_id = $request->input('brand_id');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->specifications = $request->input('specifications');
            $product->save();
            $primaryImage = new ProductImage();
            $primaryImage->product_id = $product->id;
            $primaryImage->image_path = $imagePrimaryPath;
            $primaryImage->is_primary = true;
            $primaryImage->save();
            foreach ($imageSecondaryPaths as $imageSecondaryPath) {
                $secondaryImage = new ProductImage();
                $secondaryImage->product_id = $product->id;
                $secondaryImage->image_path = $imageSecondaryPath;
                $secondaryImage->is_primary = false;
                $secondaryImage->save();
            }
            return redirect()->route('product')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('error', 'Thêm sản phẩm thất bại.');
        }
    }
    public function update_product_status(Request $request, Product $product)
    {
        $request->validate([
            'status_new' => 'required|in:1,2,3',
        ]);
        try {
            $newStatus = $request->input('status_new');
            if ($newStatus == 2) {
                $product->quantity = 0;
            }
            $product->status = $newStatus;
            $product->save();
            return redirect()->route('product')->with('success', 'Đã cập nhật trạng thái sản phẩm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật trạng thái sản phẩm không thành công: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->status = 3;
            $product->quantity = 0;
            $product->save();
            return redirect()->route('product')->with('success', 'Trạng thái của sản phẩm được đặt thành công "Đã xóa"!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', 'Failed to update product status: ' . $e->getMessage());
        }
    }
}
