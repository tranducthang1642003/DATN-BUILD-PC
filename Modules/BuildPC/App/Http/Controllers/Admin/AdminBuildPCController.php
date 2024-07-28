<?php

namespace Modules\BuildPC\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Order\Entities\Order_items;
use Modules\Product\Entities\ProductImage;


class AdminBuildPCController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');

        // Lấy các category là BuildPC
        $buildPCCategories = Category::where('build_pc', 1)->pluck('id');

        // Truy vấn các sản phẩm thuộc các category BuildPC
        $productsQuery = Product::query()->whereIn('category_id', $buildPCCategories);

        if ($startDate && $endDate) {
            $productsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $productsQuery->where('product_name', 'like', '%' . $keyword . '%');
        }

        $products = $productsQuery->paginate(10);

        return view('admin.buildpc.show', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buildpc.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin.buildpc.show', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.buildpc.show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        ProductImage::where('product_id', $product->id)->delete();
        Order_items::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('admin.buildpc')->with('success', 'Xóa linh kiện thành công!');
    }
}
