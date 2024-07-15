<?php

namespace Modules\Cart\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cart\Entities\CartItem;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Promotion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Modules\Settings\Entities\Menu;


class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $menuItems = Menu::all();

        if ($user) {
            $cartItems = CartItem::where('user_id', $user->id)
                ->with('product.images')
                ->get();
        } else {
            $cartItems = collect(session()->get('cart', []));
        }

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        $totalDiscount = 0;
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon');
            $totalDiscount = $coupon['discount'];
            $totalPrice -= $totalDiscount;
        }

        $cartItems->each(function ($cartItem) {
            $primaryImage = $cartItem->product->images->firstWhere('is_primary', 1);
            $cartItem->primary_image_path = $primaryImage ? $primaryImage->image_path : null;
        });

        return view('public.cart', compact('cartItems', 'totalPrice', 'totalDiscount','menuItems'));
    }

    // public function applyCoupon(Request $request)
    // {
    //     $request->validate([
    //         'coupon_code' => 'required|string',
    //     ]);

    //     $coupon = Promotion::where('promotion_code', $request->coupon_code)
    //         ->where('start_date', '<=', now())
    //         ->where('end_date', '>=', now())
    //         ->first();

    //     if (!$coupon) {
    //         return redirect()->back()->withErrors('Mã giảm giá không hợp lệ hoặc đã hết hạn.');
    //     }

    //     session()->put('coupon', [
    //         'code' => $coupon->promotion_code,
    //         'discount' => $coupon->discount,
    //     ]);

    //     return redirect()->route('cart')->with('success_message', 'Đã áp dụng mã giảm giá thành công.');
    // }


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

    // Ensure the coupon discount is correctly applied
    $discount = $coupon->discount;
    session()->put('coupon', [
        'code' => $coupon->promotion_code,
        'discount' => $discount,
    ]);

    return redirect()->route('cart')->with('success_message', 'Đã áp dụng mã giảm giá thành công.');
}

    public function addToCart(Request $request)
    {

        Log::info('addToCart method called');
        Log::info('Request Data: ', $request->all());


        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }

        $quantity = $request->input('quantity', 1);

        if (auth()->check()) {
            // For authenticated users, save items to database
            $user = auth()->user();

            $existingCart = CartItem::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($existingCart) {
                $existingCart->update(['quantity' => $existingCart->quantity + $quantity]);
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }

            $totalQuantity = CartItem::where('user_id', $user->id)->sum('quantity');
        } else {
            // For guest users, save items to session
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'product' => $product,
                ];
            }

            session()->put('cart', $cart);
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
        }

        session()->put('cart_count', $totalQuantity);

        return response()->json(['success' => true, 'message' => 'Đã thêm sản phẩm vào giỏ hàng.', 'totalQuantity' => $totalQuantity]);
    }


    public function updateQuantity(Request $request, $cartItemId)
    {
        $change = $request->input('change', 0);

        if (auth()->check()) {
            $cartItem = CartItem::find($cartItemId);
            if (!$cartItem) {
                return response()->json(['success' => false, 'message' => 'Cart item not found.']);
            }

            $newQuantity = $cartItem->quantity + $change;

            if ($newQuantity <= 0) {
                $cartItem->delete();
            } else {
                $cartItem->update(['quantity' => $newQuantity]);
            }

            $totalQuantity = CartItem::where('user_id', auth()->id())->sum('quantity');
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$cartItemId])) {
                $cart[$cartItemId]['quantity'] += $change;

                if ($cart[$cartItemId]['quantity'] <= 0) {
                    unset($cart[$cartItemId]);
                }
            }

            session()->put('cart', $cart);
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
        }

        session()->put('cart_count', $totalQuantity);

        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }


    public function getCartItems()
    {
        $cartItems = collect();

        if (auth()->check()) {
            $cartItems = CartItem::where('user_id', auth()->id())
                ->with('product.images')
                ->get();
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as $item) {
                $cartItems->push((object) $item);
            }
        }

        $cartItems->each(function ($cartItem) {
            $primaryImage = $cartItem->product->images->firstWhere('is_primary', 1);
            $cartItem->primary_image_path = $primaryImage ? $primaryImage->image_path : null;
        });

        return response()->json(['success' => true, 'cartItems' => $cartItems]);
    }


    public function destroy($id)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $cartItem = CartItem::find($id);

            if (!$cartItem || $cartItem->user_id !== $user->id) {
                return redirect()->route('cart')->with('error_message', 'Sản phẩm không tồn tại trong giỏ hàng hoặc bạn không có quyền xóa sản phẩm này.');
            }

            $cartItem->delete();
            $totalQuantity = CartItem::where('user_id', $user->id)->sum('quantity');
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
        }

        session()->put('cart_count', $totalQuantity);

        return redirect()->route('cart')->with('success_message', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }
}
