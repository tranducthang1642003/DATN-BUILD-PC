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

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $statusCounts = [
            '1' => Product::where('status', 1)->count(),
            '2' => Product::where('status', 2)->count(),
            '3' => Product::where('status', 3)->count(),
            '4' => Product::all()->count(),
        ];
        $productsQuery = Product::with('brand', 'category', 'image');
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
            $productsQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $products = $productsQuery->paginate(10);
        return view('admin.product.product', compact('products', 'statusCounts'));
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
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',
            'id_category' => 'required|string',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'product_code' => 'required|string',
        ]);
        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->price = $validatedData['price'];
        $product->id_category = $validatedData['id_category'];
        $product->sale = $validatedData['sale'];
        $product->quantity = $validatedData['quantity'];
        $product->brand()->associate($validatedData['id_brand']);
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];
        $product->featured = $validatedData['featured'] === 'yes' ? true : false;
        $product->slug = $validatedData['slug'];
        $product->discount = $validatedData['discount'];
        $product->product_code = $validatedData['product_code'];
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
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',
            'id_category' => 'required|exists:categories,id',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|exists:brands,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'product_code' => 'required|string',
        ]);
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->price = $validatedData['price'];
        $product->id_category = $validatedData['id_category'];
        $product->sale = $validatedData['sale'];
        $product->quantity = $validatedData['quantity'];
        $product->id_brand = $validatedData['id_brand'];
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];
        $product->featured = $validatedData['featured'] === 'yes' ? true : false;
        $product->slug = $validatedData['slug'];
        $product->discount = $validatedData['discount'];
        $product->product_code = $validatedData['product_code'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }
        if ($product->save()) {
            return redirect()->route('product')->with('success', 'Product added successfully!');
        } else {
            return redirect()->back()->withInput()->withErrors('Failed to add product.');
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
