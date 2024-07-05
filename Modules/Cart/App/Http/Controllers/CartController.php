<?php

namespace Modules\Cart\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Entities\User;
use Modules\Cart\Entities\CartItem;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Modules\Product\Entities\Promotion; // Sửa đổi đường dẫn cho Promotion model

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();

        // Tính tổng giá tiền của các sản phẩm trong giỏ hàng
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        // Kiểm tra và áp dụng giảm giá từ mã coupon nếu có
        $totalDiscount = 0;
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon');
            $totalDiscount = $coupon['discount'];
            $totalPrice -= $coupon['discount'];
        }

        // Lấy ảnh chính của sản phẩm để hiển thị
        $cartItems->each(function ($cartItem) {
            $primary_image = $cartItem->product->images->firstWhere('is_primary', 1);
            $cartItem->primary_image_path = $primary_image ? $primary_image->image_path : null;
        });

        return view('public.cart', compact('cartItems', 'totalPrice', 'totalDiscount'));
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $coupon = Promotion::where('promotion_code', $request->coupon_code)
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

        return redirect()->route('cart.index')->with('success_message', 'Đã áp dụng mã giảm giá thành công.');
    }

    // Các phương thức khác của CartController không có vấn đề, đã được triển khai đúng.

    // Ví dụ phương thức thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $existingCart = CartItem::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $request->input('quantity', 1),
            ]);
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }
}
