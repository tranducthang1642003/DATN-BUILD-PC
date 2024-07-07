<?php

namespace Modules\Promotions\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voucher = Promotions::All();
        return view('admin.voucher.add', compact('voucher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('promotions::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voucher = Promotions::All()->findOrFail($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
