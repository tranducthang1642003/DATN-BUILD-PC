<?php

namespace Modules\Order\App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\Order\App\Emails\OrderStatusUpdated;
use Modules\Order\Entities\Orders;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $ordersQuery = Orders::query();
        if ($startDate && $endDate) {
            $ordersQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $ordersQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $orders = $ordersQuery->with('items')->paginate(13);
        return view('admin.order.order', compact('orders'));
    }
    public function show($id)
    {
        $order = Orders::with('items')->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }
    public function updateStatus(Request $request, Orders $order)
    {
        $request->validate([
            'new_status' => 'required|in:pending,processing,cancelled,completed',
        ]);
        try {
            $oldStatus = $order->status;
            $newStatus = $request->input('new_status');
            $order->status = $newStatus;
            $order->save();
            $order->customer_email = "trunghieuuazz@gmail.com";
            Mail::to($order->customer_email)->send(new OrderStatusUpdated($order, $oldStatus, $newStatus));
            return redirect()->route('order')->with('success', 'Đã cập nhật trạng thái đơn hàng và gửi email thông báo');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật trạng thái không thành công: ' . $e->getMessage());
        }
    }
    public function updateMultipleStatus(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'status' => 'required|array',
            'status.*' => 'in:pending,processing,cancelled,completed',
        ]);
        foreach ($request->input('orders') as $orderId) {
            $order = Orders::find($orderId);
            if ($order) {
                $order->status = $request->input('status')[$orderId];
                $order->save();
            }
        }
        return redirect()->back()->with('success', 'Đã cập nhật trạng thái cho các đơn hàng được chọn');
    }
}
