<?php

namespace Modules\Cart\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Entities\User;
use Modules\Cart\Entities\CartItem;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Promotion;

// Sửa đổi đường dẫn cho Promotion model

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

        session()->put('coupon', [
            'code' => $coupon->promotion_code,
            'discount' => $coupon->discount,
        ]);

        return redirect()->route('cart.index')->with('success_message', 'Đã áp dụng mã giảm giá thành công.');
    }

    // public function addToCart(Request $request)
    // {
    //     $user = auth()->user();
    //     $productId = $request->input('product_id');
    //     $product = Product::find($productId);

    //     if (!$product) {
    //         return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    //     }

    //     $existingCart = CartItem::where('user_id', $user->id)
    //         ->where('product_id', $productId)
    //         ->first();

    //     if ($existingCart) {
    //         $existingCart->update([
    //             'quantity' => $existingCart->quantity + $request->input('quantity', 1),
    //         ]);
    //     } else {
    //         CartItem::create([
    //             'user_id' => $user->id,
    //             'product_id' => $productId,
    //             'quantity' => $request->input('quantity', 1),
    //         ]);
    //     }

    //     return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    // }
    public function addToCart(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
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

        // Calculate total quantity in cart
        $totalQuantity = CartItem::where('user_id', $user->id)->sum('quantity');
        session()->put('cart_count', $totalQuantity); // Store cart count in session

        session()->flash('success_message', 'Đã thêm sản phẩm vào giỏ hàng.');

        // Return JSON response with success and totalQuantity
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sản phẩm vào giỏ hàng.',
            'totalQuantity' => $totalQuantity,
        ]);
    }

    public function updateQuantity(Request $request, $cartItemId)
    {
        $cartItem = CartItem::find($cartItemId);
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }
    
        $user = auth()->user(); // Lấy user hiện tại
        $change = $request->input('change', 0);
        $newQuantity = $cartItem->quantity + $change;
    
        if ($newQuantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->update(['quantity' => $newQuantity]);
        }
    
        // Cập nhật lại số lượng sản phẩm trong giỏ hàng
        $totalQuantity = CartItem::where('user_id', $user->id)->sum('quantity');
        session()->put('cart_count', $totalQuantity);
    
        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }

    

    public function getCartItems()
{
    $user = auth()->user();
    $cartItems = CartItem::where('user_id', $user->id)
        ->with('product')
        ->get();

    $cartItems->each(function ($cartItem) {
        $primary_image = $cartItem->product->images->firstWhere('is_primary', 1);
        $cartItem->primary_image_path = $primary_image ? $primary_image->image_path : null;
    });

    return response()->json([
        'success' => true,
        'cartItems' => $cartItems,
    ]);
}



    public function destroy($id)
    {
        $user = auth()->user();
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return redirect()->route('cart')->with('error_message', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }
        if ($cartItem->user_id !== $user->id) {
            return redirect()->route('cart')->with('error_message', 'Bạn không có quyền xóa sản phẩm này.');
        }
        $cartItem->delete();

        // Cập nhật lại số lượng sản phẩm trong giỏ hàng sau khi xóa
        $totalQuantity = CartItem::where('user_id', $user->id)->sum('quantity');
        session()->put('cart_count', $totalQuantity);
        return redirect()->route('cart')->with('success_message', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

}
