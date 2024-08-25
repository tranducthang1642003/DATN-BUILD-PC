<?php

namespace Modules\Review\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Review\Entities\Review;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\App\Http\Models\Reviews;

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


public function update_status(Request $request)
{
    // Lấy review dựa trên review_id trong input hidden
    $review = Review::find($request->input('review_id'));

    // Kiểm tra xem đối tượng Review có tồn tại không
    if ($review) {
        $review->active = $request->active_new; // Gán giá trị của active_new cho thuộc tính active
        $review->save();

        // Bạn có thể thêm bất kỳ logic hoặc kiểm tra bổ sung nào ở đây

        return redirect()->back()->with('success', 'Cập nhật trạng thái đánh giá thành công');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy đánh giá để cập nhật');
    }
}
}