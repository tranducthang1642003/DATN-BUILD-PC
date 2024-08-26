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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


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


    // public function placeOrder(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'required|string',
    //         'phone-number' => 'required|string',
    //         'email' => 'required|email', // Ensure email is required and validated
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'district' => 'required|string',
    //         'payment-method' => 'required|in:cash,momo,vnpay',
    //     ]);
    
    //     $user = auth()->user();
    
    //     $cartItems = CartItem::where('user_id', $user->id)
    //         ->with('product')
    //         ->get();
    
    //     if ($cartItems->isEmpty()) {
    //         return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
    //     }
    
    //     // Generate a 6-character random uppercase alphanumeric code
    //     $orderCode = Str::upper(Str::random(6));
    
    //     $order = Orders::create([
    //         'user_id' => $user->id,
    //         'order_code' => $orderCode,
    //         'full_name' => $request->input('full_name'),
    //         'phone_number' => $request->input('phone-number'),
    //         'email' => $request->input('email'), // Ensure email is provided
    //         'address' => 'required|string', // Ensure address is required
    //         'city' => 'required|string', // Ensure address is required

    //         'total_amount' => $cartItems->sum(function ($cartItem) {
    //             return $cartItem->product->price * $cartItem->quantity;
    //         }),
    //         'shipping_address' => $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('district'),
    //         'payment_method' => $request->input('payment-method'),
    //         'status' => 'pending',
    //     ]);
    
    //     foreach ($cartItems as $cartItem) {
    //         Order_items::create([
    //             'order_id' => $order->id,
    //             'product_id' => $cartItem->product_id,
    //             'quantity' => $cartItem->quantity,
    //             'price' => $cartItem->product->price,
    //         ]);
    //     }
    
    //     CartItem::where('user_id', $user->id)->delete();
    //     Mail::to($user->email)->send(new CheckoutEmail($order));
    
    //     return redirect()->route('orders.paymentsuccess')->with('success', 'Đặt hàng thành công.');
    // }




    public function placeOrder(Request $request)
{
    $request->validate([
        'full_name' => 'required|string',
        'phone-number' => 'required|string',
        'email' => 'required|email',
        'address' => 'required|string',
        'city' => 'required|string',
        'payment-method' => 'required|in:cash,momo,vnpay',
    ]);
    
    $user = auth()->user();
    $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
    }

    $orderCode = Str::upper(Str::random(6));
    $totalAmount = $cartItems->sum(function ($cartItem) {
        return $cartItem->product->price * $cartItem->quantity;
    });

    $order = Orders::create([
        'user_id' => $user->id,
        'order_code' => $orderCode,
        'full_name' => $request->input('full_name'),
        'phone_number' => $request->input('phone-number'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'city' => $request->input('city'),

        'total_amount' => $totalAmount,
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

    if ($request->input('payment-method') === 'momo') {
        return $this->handleMomoPayment($order, $totalAmount);
    }

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
    
   
    public function handleMomoPayment(Orders $order, $totalAmount)
{
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    $orderInfo = "Thanh toán qua MoMo";
    $amount = $totalAmount;
    $orderId = $order->order_code;  // Use order code or any unique identifier
    $redirectUrl = url('/orders/checkout/success');  // Adjust redirect URL
    $ipnUrl = url('/orders/checkout/ipn');  // IPN (Instant Payment Notification) URL

    $requestId = time() . "";
    $requestType = "payWithATM";

    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);

    $data = [
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => "",
        'requestType' => $requestType,
        'signature' => $signature
    ];

    $response = Http::post($endpoint, $data);
    $jsonResult = $response->json();

    if (isset($jsonResult['payUrl'])) {
        return redirect()->to($jsonResult['payUrl']);
    } else {
        return redirect()->route('orders.checkout')->with('error', 'Lỗi khi xử lý thanh toán MoMo.');
    }
}
public function myorder()
{
    $user=Auth::User();
    $menuItems = Menu::all();
    $title = 'Đơn hàng của bạn';

    $OrderItem = Orders::where('user_id', $user->id)->with('product')->paginate(7);
    return view('public.dashboard.myorder',compact('OrderItem','menuItems','title'));
}
}