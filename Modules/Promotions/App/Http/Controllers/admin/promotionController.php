<?php

namespace Modules\Promotions\App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\Product;
use Modules\Promotions\Entities\Promotions;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $vouchersQuery = Promotions::query();
        if ($startDate && $endDate) {
            $vouchersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $vouchersQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $vouchers = $vouchersQuery->paginate(10);
        return view('admin.voucher.voucher', compact('vouchers'));
    }

    public function create()
    {
        $products = Product::All();
        // dd($products);
        return view('admin.voucher.add', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'promotion_code' => 'required|string|unique:promotions,promotion_code',
            'discount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'product_id' => 'required|numeric',
            'description' => 'required|string',
        ]);
        // dd($validatedData);
        $promotion = new Promotions();
        if($validatedData['product_id'] === 0) {
            $promotion->all = 1;
        };
        $promotion->promotion_code = $validatedData['promotion_code'];
        $promotion->discount = $validatedData['discount'];
        $promotion->start_date = $validatedData['start_date'];
        $promotion->end_date = $validatedData['end_date'];
        // $promotion->product_id = $validatedData['product_id'];
        $promotion->description = $validatedData['description'];
        // dd($promotion);
        if ($promotion->save()) {
            return redirect()->route('vouchers.index')->with('success', 'Đã thêm mã giảm giá thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('Thêm mã giảm giá thất bại.');
        }
    }

    public function show($id)
    {
        return view('promotions::show');
    }

    public function edit($id)
    {
        $products = Product::All();
        $voucher = Promotions::findOrFail($id);
        return view('admin.voucher.edit', compact('voucher', 'products'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
            'parent_id' => 'required|string',
        ]);
        $voucher = Promotions::findOrFail($id);
        $voucher->voucher_name = $validatedData['voucher_name'];
        $voucher->slug = $validatedData['slug'];
        $voucher->featured = $validatedData['featured'] === 'yes';
        $voucher->status = $validatedData['status'];
        $voucher->description = $validatedData['description'];
        $voucher->parent_id = $validatedData['parent_id'];
        $voucher->save();

        return redirect()->route('voucher');
    }

    public function destroy($id)
    {
        $voucher = Promotions::findOrFail($id);
        $voucher->delete();
        return redirect()->route('voucher')->with('success', 'voucher deleted successfully!');
    }
}
