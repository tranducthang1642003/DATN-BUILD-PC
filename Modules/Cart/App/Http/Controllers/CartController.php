<?php

namespace Modules\Cart\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Entities\User;
use Modules\Cart\Entities\CartItem;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;


class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
        $cartItems->primary_image_path = $primary_image ? $primary_image->image_path : null;
        $cartItems->secondary_images = $secondary_images;
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        return view('public.cart', compact('cartItems', 'totalPrice'));
    }




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
    

    public function updateQuantity($id, Request $request)
    {
        $user = auth()->user();
        $cartItem = CartItem::where('user_id', $user->id)->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('change', 0);
            if ($cartItem->quantity < 1) {
                $cartItem->quantity = 1;
            }
            $cartItem->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $cartItem = CartItem::where('user_id', $user->id)->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    public function checkout()
    {
        return view('public.checkout');
    }

}
