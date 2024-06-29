<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Brands;
use Modules\Admin\App\Http\Models\Category;
use Modules\Admin\App\Http\Models\Product;
use Illuminate\Support\Str;
use Modules\Admin\App\Http\Models\Product_images;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $statusCounts = [
            '1' => Product::where('status', 1)->count(),
            '2' => Product::where('status', 2)->count(),
            '3' => Product::where('status', 3)->count(),
            '4' => Product::count(), // Tổng số sản phẩm
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
            $primary_image = Product_images::where('product_id', $product->id)
                ->where('is_primary', 1)
                ->first();
            $product->primary_image_url = $primary_image ? $primary_image->image_path : null;
            $secondary_images = Product_images::where('product_id', $product->id)
                ->where('is_primary', 0)
                ->get();
            $products_images[$product->id] = [
                'primary_image' => $primary_image,
                'secondary_images' => $secondary_images,
            ];
        }
        return view('admin.product.product', compact('products', 'statusCounts', 'products_images'));
    }


    public function edit($id)
    {
        $brands = Brands::All();
        $categories = Category::all();
        $product = Product::with('brand', 'category', 'image')->findOrFail($id);
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }
    public function update_product(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'category_id' => 'required|string',
            'brand_id' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|string',
            'description' => 'required|string',
            'specifications' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->product_name = $validatedData['product_name'];
        $product->slug = $validatedData['slug'];
        $product->product_code = $validatedData['product_code'];
        $product->color = $validatedData['color'];
        $product->quantity = $validatedData['quantity'];
        $product->sale = $validatedData['sale'];
        $product->featured = $validatedData['featured'] === 'yes' ? true : false;
        $product->category_id = $validatedData['category_id'];
        $product->brand_id = $validatedData['brand_id'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->description = $validatedData['description'];
        $product->specifications = $validatedData['specifications'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('product');
    }


    public function add()
    {
        $brands = Brands::All();
        $categories = Category::all();
        $product = Product::with('brand', 'category', 'image');
        return view('admin.product.add', compact('product', 'brands', 'categories'));
    }
    public function add_product(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
            'specifications' => 'required|string',
            'image_url' => 'required|url',
        ]);

        $product_images = new Product_images();
        $product_images->image_url = $validatedData['image_url'];
        $product_images->save();

        $image_id = $product_images->id;

        $product = new Product();
        $product->product_name = $validatedData['product_name'];
        $product->slug = Str::slug($validatedData['product_name'], '-');
        $product->product_code = $validatedData['product_code'];
        $product->color = $validatedData['color'];
        $product->quantity = $validatedData['quantity'];
        $product->sale = $validatedData['sale'];
        $product->featured = $validatedData['featured'] === 'yes';
        $product->status = $validatedData['status'];
        $product->view = 0;
        $product->category_id = $validatedData['category_id'];
        $product->brand_id = $validatedData['brand_id'];
        $product->price = $validatedData['price'];
        $product->product_images_id = $image_id;
        $product->promotion_id = NULL;
        $product->wishlists_id = NULL;
        $product->reviews_id = NULL;
        $product->stock = $validatedData['stock'];
        $product->description = $validatedData['description'];
        $product->specifications = $validatedData['specifications'];

        if ($product->save()) {
            return redirect()->route('product')->with('success', 'Thêm sản phẩm thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('Thêm sản phẩm thất bại.');
        }
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }
}
