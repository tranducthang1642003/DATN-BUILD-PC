<?php

namespace Modules\Review\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Review\Entities\Review;
use Illuminate\Support\Facades\Auth;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin - Bình luận';
        $reviews= review::all();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if ($startDate && $endDate) {
            $reviews->whereBetween('created_at', [$startDate, $endDate]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $reviews->where('comment', 'like', '%' . $keyword . '%');
        }
        return view('admin.review.review',compact('reviews', 'title'));
    }
    public function deletereview(string $id)
{
    $review = review::find($id);
    if ($review) {
        $review->delete();
        return back();
    }else
    {
        return redirect()->route('like');
    }
    
}
}