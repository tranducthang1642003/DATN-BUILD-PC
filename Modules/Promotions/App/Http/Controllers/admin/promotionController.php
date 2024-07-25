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
        $promotion = new Promotions();
        $promotion->promotion_code = $validatedData['promotion_code'];
        $promotion->discount = $validatedData['discount'];
        $promotion->start_date = $validatedData['start_date'];
        $promotion->end_date = $validatedData['end_date'];
        $promotion->description = $validatedData['description'];

        if ($validatedData['product_id'] == 0) {
            $promotion->product_id = null;
            $promotion->all = 1;
        } else {
            $promotion->product_id = $validatedData['product_id'];
            $promotion->all = 0;
        }
        $promotion->save();
        if ($promotion->save()) {
            return redirect()->route('vouchers.index')->with('success', 'Đã thêm mã giảm giá thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('error', 'Thêm mã giảm giá thất bại.');
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
            'promotion_code' => 'required|string',
            'discount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'product_id' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $promotion = Promotions::findOrFail($id);
        $promotion->promotion_code = $validatedData['promotion_code'];
        $promotion->discount = $validatedData['discount'];
        $promotion->start_date = $validatedData['start_date'];
        $promotion->end_date = $validatedData['end_date'];
        $promotion->description = $validatedData['description'];

        if ($validatedData['product_id'] == 0) {
            $promotion->product_id = null;
            $promotion->all = 1;
        } else {
            $promotion->product_id = $validatedData['product_id'];
            $promotion->all = 0;
        }
        $promotion->save();

        if ($promotion->save()) {
            return redirect()->route('vouchers.index')->with('success', 'Đã sửa mã giảm giá thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('error', 'Sửa mã giảm giá thất bại.');
        }
    }

    public function destroy($id)
    {
        $voucher = Promotions::findOrFail($id);
        $voucher->delete();
        return redirect()->route('voucher')->with('success', 'voucher deleted successfully!');
    }
}
