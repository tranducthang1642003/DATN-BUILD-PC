<?php

namespace Modules\Order\App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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
        $orders = $ordersQuery->with('items')->paginate(10);
        return view('admin.order.order', compact('orders'));
    }
    public function edit($id)
    {
        $order = Orders::All()->findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }
    public function update_order(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
        ]);
        $order = Orders::findOrFail($id);
        $order->name = $validatedData['name'];
        $order->slug = $validatedData['slug'];
        $order->description = $validatedData['description'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('order_images', 'public');
            $order->image = $imagePath;
        }
        $order->save();
        return redirect()->route('order');
    }

    public function add()
    {
        $order = Orders::All();
        return view('admin.order.add', compact('order'));
    }
    public function add_order(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'id_order' => 'required|exists:orders,id',
            'sale' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image',
            'id_brand' => 'required|exists:brands,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'featured' => 'required|in:yes,no',
            'slug' => 'required|string',
            'discount' => 'required|numeric',
            'order_code' => 'required|string',
        ]);
        $order = new Orders();
        $order->name = $validatedData['name'];
        $order->color = $validatedData['color'];
        $order->price = $validatedData['price'];
        $order->id_order = $validatedData['id_order'];
        $order->sale = $validatedData['sale'];
        $order->quantity = $validatedData['quantity'];
        $order->id_brand = $validatedData['id_brand'];
        $order->short_description = $validatedData['short_description'];
        $order->long_description = $validatedData['long_description'];
        $order->featured = $validatedData['featured'] === 'yes' ? true : false;
        $order->slug = $validatedData['slug'];
        $order->discount = $validatedData['discount'];
        $order->order_code = $validatedData['order_code'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('order_images', 'public');
            $order->image = $imagePath;
        }
        if ($order->save()) {
            return redirect()->route('order')->with('success', 'order added successfully!');
        } else {
            return redirect()->back()->withInput()->withErrors('Failed to add order.');
        }
    }
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        if ($order->image) {
            Storage::disk('public')->delete($order->image);
        }
        $order->delete();
        return redirect()->route('order')->with('success', 'order deleted successfully!');
    }

}
