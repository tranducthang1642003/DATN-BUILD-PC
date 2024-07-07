<?php

namespace Modules\Product\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\Entities\Promotion;


class CouponController extends Controller
{
    
    public function index(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $coupon = promotions::where('promotion_code', $request->coupon_code)
        ->where('start_date', '<=', now())
        ->where('end_date', '>=', now())
        ->first();

        if (!$coupon) {
            return redirect()->back()->withErrors('Mã giảm giá không hợp lệ hoặc đã hết hạn.');
        }

        // Lưu thông tin mã giảm giá vào session để sử dụng ở trang giỏ hàng
        session()->put('coupon', [
            'code' => $coupon->promotion_code,
            'discount' => $coupon->discount,
        ]);

        return redirect()->back()->with('success_message', 'Đã áp dụng mã giảm giá thành công.');
    }
    }

  

