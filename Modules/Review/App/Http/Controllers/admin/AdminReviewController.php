<?php

namespace Modules\Review\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Review\Entities\Review;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin - Bình luận';
        $query = Review::query();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $query->where('comment', 'like', '%' . $keyword . '%');
        }
        $reviews = $query->paginate(10);
        return view('admin.review.review', compact('reviews', 'title'));
    }

    public function deletereview(string $id)
    {
        $review = review::find($id);
        if ($review) {
            $review->delete();
            return back();
        } else {
            return redirect()->route('like');
        }
    }

    public function update_status(Request $request, review $reviews)
    {
        $request->validate([
            'active_new' => 'required|in:1,0',
        ]);
        try {
            $reviews->status = $request->input('active_new');
            $reviews->save();
            return redirect()->route('adminreview')->with('success', 'Đã cập nhật trạng thái bình luận thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật trạng thái không thành công: ' . $e->getMessage());
        }
    }
}
