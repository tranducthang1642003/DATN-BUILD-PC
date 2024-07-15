<?php

namespace Modules\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cart\Entities\CartItem;
use Modules\Order\Entities\Orders;
use Modules\Order\Entities\Order_items;
use Illuminate\Support\Facades\Mail;
use Modules\Order\App\Emails\CheckoutEmail;
use Modules\Settings\Entities\Menu;
use Illuminate\Support\Str;


class OrderController1 extends Controller
{
    public function checkout()
    {
        $user = auth()->user();
        $menuItems = Menu::all();

        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();
            $cartItems->each(function ($cartItem) {
                $primary_image = $cartItem->product->images->firstWhere('is_primary', 1);
                $cartItem->primary_image_path = $primary_image ? $primary_image->image_path : null;
            });

        $total = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        return view('public.checkout', compact('cartItems', 'total','menuItems'));
    }


    public function placeOrder(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'phone-number' => 'required|string',
            'email' => 'required|email', // Ensure email is required and validated
            'address' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'payment-method' => 'required|in:cash,momo,vnpay',
        ]);
    
        $user = auth()->user();
    
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
    
        // Generate a 6-character random uppercase alphanumeric code
        $orderCode = Str::upper(Str::random(6));
    
        $order = Orders::create([
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone-number'),
            'email' => $request->input('email'), // Ensure email is provided
            'address' => 'required|string', // Ensure address is required
            'city' => 'required|string', // Ensure address is required

            'total_amount' => $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            }),
            'shipping_address' => $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('district'),
            'payment_method' => $request->input('payment-method'),
            'status' => 'pending',
        ]);
    
        foreach ($cartItems as $cartItem) {
            Order_items::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }
    
        CartItem::where('user_id', $user->id)->delete();
        Mail::to($user->email)->send(new CheckoutEmail($order));
    
        return redirect()->route('orders.paymentsuccess')->with('success', 'Đặt hàng thành công.');
    }
    
    public function paymentsuccess()
    {
        $menuItems = Menu::all();

        return view('public.Paymentsuccess',compact('menuItems')); 
    }

    public function showLookupForm()
    {
        $menuItems = Menu::all();

        return view('public.orders.lookup',compact('menuItems'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string|size:6',
        ]);
    
        $menuItems = Menu::all();
    
        $orderCode = $request->input('order_code');
        $order = Orders::where('order_code', $orderCode)->first();
    
        if (!$order) {
            return redirect()->route('orders.lookup.form')->with('error', 'Không tìm thấy đơn hàng với mã này.');
        }
    
        $order->items->each(function ($orderItem) {
            $primary_image = $orderItem->product->images->firstWhere('is_primary', 1);
            $orderItem->primary_image_path = $primary_image ? $primary_image->image_path : null;
        });
    
        return view('public.orders.detail', compact('order', 'menuItems'));
    }
    

}