<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to VNPAY</title>
</head>
<body>
    <form id="paymentForm" action="{{ $vnp_Url }}" method="get">
        @csrf
        <input type="hidden" name="vnp_TmnCode" value="{{ $vnp_TmnCode }}">
        <input type="hidden" name="vnp_Amount" value="{{ $vnp_Amount }}">
        <input type="hidden" name="vnp_Command" value="{{ $vnp_Command }}">
        <input type="hidden" name="vnp_CurrCode" value="{{ $vnp_CurrCode }}">
        <input type="hidden" name="vnp_OrderInfo" value="{{ $vnp_OrderInfo }}">
        <input type="hidden" name="vnp_Locale" value="{{ $vnp_Locale }}">
        <input type="hidden" name="vnp_ReturnUrl" value="{{ $vnp_ReturnUrl }}">
        <input type="hidden" name="vnp_TxnRef" value="{{ $vnp_TxnRef }}">
        <input type="hidden" name="vnp_CreateDate" value="{{ $vnp_CreateDate }}">
        <input type="hidden" name="vnp_SecureHash" value="{{ $vnp_SecureHash }}">
    </form>

    <script>
        document.getElementById('paymentForm').submit();
    </script>
</body>
</html>
