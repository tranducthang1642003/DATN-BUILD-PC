<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\App\Http\Models\Promotions;

class VoucherController extends Controller
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
    public function edit($id)
    {
        $voucher = Promotions::All()->findOrFail($id);
        return view('admin.voucher.edit', compact('voucher'));
    }
    public function update_voucher(Request $request, $id)
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

    public function add()
    {
        $voucher = Promotions::All();
        return view('admin.voucher.add', compact('voucher'));
    }
    public function add_voucher(Request $request)
    {
        $validatedData = $request->validate([
            'voucher_name' => 'required|string',
            'slug' => 'required|string',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'description' => 'required|string',
        ]);
        $voucher = new Promotions();
        $voucher->voucher_name = $validatedData['voucher_name'];
        $voucher->slug = $validatedData['slug'];
        $voucher->featured = $validatedData['featured'] === 'yes';
        $voucher->status = $validatedData['status'];
        $voucher->description = $validatedData['description'];

        if ($voucher->save()) {
            return redirect()->route('voucher')->with('success', 'Đã thêm danh mục thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('Thêm danh mục thất bại.');
        }
    }

    public function destroy($id)
    {
        $voucher = Promotions::findOrFail($id);
        $voucher->delete();
        return redirect()->route('voucher')->with('success', 'voucher deleted successfully!');
    }
}
