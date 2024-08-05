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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

        return view('public.checkout', compact('cartItems', 'total', 'menuItems'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'payment_method' => 'required|in:cash,momo,vnpay',
        ]);

        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('orders.checkout')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $paymentMethod = $request->input('payment_method');
        $orderCode = Str::upper(Str::random(6));

        $order = Orders::create([
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'total_amount' => $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            }),
            'shipping_address' => $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('district'),
            'payment_method' => $paymentMethod,
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
        if ($paymentMethod === 'momo') {
            return redirect()->route('momo', ['order_code' => $orderCode]);
        } elseif ($paymentMethod === 'momo')
        {
            return redirect()->route('momo', ['order_code' => $orderCode]);
        }

        return redirect()->route('orders.paymentsuccess')->with('success', 'Đặt hàng thành công.');
    }

    public function paymentsuccess()
    {
        $menuItems = Menu::all();
        return view('public.Paymentsuccess', compact('menuItems'));
    }

    public function showLookupForm()
    {
        $menuItems = Menu::all();
        return view('public.orders.lookup', compact('menuItems'));
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

    public function vnPayPaymentGet(Request $request)
    {

        $orderCode = $request->input('order_code');
        $order = Orders::where('order_code', $orderCode)->first();

        if (!$order) {
            return redirect()->route('orders.checkout')->with('error', 'Đơn hàng không tìm thấy.');
        }

        $vnp_TmnCode = config('vnpay.vnp_TmnCode');
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_Url = config('vnpay.vnp_Url');
        $vnp_ReturnUrl = config('vnpay.vnp_ReturnUrl');

        $vnp_TxnRef = $order->id;
        $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $orderCode;
        $vnp_Amount = $order->total_amount * 100; // VNPay yêu cầu số tiền là số nguyên
        $vnp_Locale = 'vn';
        $vnp_CurrCode = 'VND';
        $vnp_CreateDate = Carbon::now()->format('YmdHis'); // Định dạng ngày tháng theo yêu cầu
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');

        $inputData = [
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode" => $vnp_CurrCode,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_Locale" => $vnp_Locale,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

       
        ksort($inputData);
        $query = http_build_query($inputData);
        $vnp_SecureHash = md5($vnp_HashSecret . $query);
        Log::info('VNPAY Request Data:', [
            'vnp_Url' => $vnp_Url,
            'query' => $query,
            'vnp_SecureHash' => $vnp_SecureHash,
        ]);

        return view('public.orders.vnpay_payment', [
            'vnp_Url' => $vnp_Url,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_TmnCode' => $vnp_TmnCode,
            'vnp_CurrCode' => $vnp_CurrCode,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_Locale' => $vnp_Locale,
            'vnp_ReturnUrl' => $vnp_ReturnUrl,
            'vnp_TxnRef' => $vnp_TxnRef,
            'vnp_CreateDate' => $vnp_CreateDate,
            'vnp_SecureHash' => $vnp_SecureHash,
        ]);
    }



    public function vnPayCallback(Request $request)
    {
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_SecureHash = $request->input('vnp_SecureHash');

        $inputData = $request->except('vnp_SecureHash');
        ksort($inputData);

        $query = http_build_query($inputData);
        $secureHash = md5($vnp_HashSecret . $query);

        Log::info('VNPAY Callback:', ['secureHash' => $secureHash, 'vnp_SecureHash' => $vnp_SecureHash]);

        if ($secureHash === $vnp_SecureHash) {
            if ($vnp_ResponseCode === '00') {
                return redirect()->route('orders.paymentsuccess')->with('success', 'Thanh toán thành công.');
            } else {
                return redirect()->route('orders.checkout')->with('error', 'Thanh toán thất bại.');
            }
        } else {
            return redirect()->route('orders.checkout')->with('error', 'Thanh toán không hợp lệ.');
        }
    }
    

}
