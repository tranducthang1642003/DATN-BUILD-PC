<?php

namespace Modules\Review\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Review\Entities\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.home.layout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để đánh giá sản phẩm.');
        }

        $review = new Review();
        $review->product_id = $productId;
        $review->rating = $validatedData['rating'];
        $review->comment = $validatedData['comment'];
        $review->user_id = auth()->user()->id;
        $review->save();

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi thành công.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('review::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('review::edit');
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
        //
    }
}
