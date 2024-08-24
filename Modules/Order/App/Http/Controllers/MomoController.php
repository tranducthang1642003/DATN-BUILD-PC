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

class MomoController extends Controller
{
    public function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
    public function momo(Request $request)
    {
      


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$data=$request->all();
$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = $data['total'];
$orderId = time() ."";
$redirectUrl = "http://127.0.0.1:8000/orders/checkout?_token=XaXowXdXgCEA40sRUTa0cfxqxLLvTQYGLY3TWvzt";
$ipnUrl = "http://127.0.0.1:8000/orders/checkout?_token=XaXowXdXgCEA40sRUTa0cfxqxLLvTQYGLY3TWvzt";
$extraData = "";



    $requestId = time() . "";
    $requestType = "payWithATM";

    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = $this-> execPostRequest($endpoint, json_encode($data));

    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there
       return redirect()->to($jsonResult['payUrl']);
}
    }
    // 9704 0000 0000 0018
    // 03/07
    // NGUYEN VAN A
    // 0919100100



