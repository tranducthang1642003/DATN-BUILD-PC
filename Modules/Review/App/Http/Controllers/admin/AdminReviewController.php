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
        $reviews= review::all();
        return view('admin.review.review',compact('reviews'));
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