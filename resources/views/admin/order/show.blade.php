<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="mx-8 pt-20 w-full">
    <div class="p-10 bg-main">
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 ">Chi tiết đơn hàng #{{ $order->id }}</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
            <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
            </p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Tên khách hàng</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->full_name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Số điện thoại</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->phone_number }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Email</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->email }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Địa chỉ giao hàng</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->shipping_address }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Thành phố</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->city }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Ngày đặt hàng</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->order_date }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Phương thức thanh toán</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ $order->payment_method }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Tổng tiền</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ number_format($order->total_amount) }} VNĐ</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Trạng thái đơn hàng</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0 flex">
                        <span class="status-indicator mt-3 {{ $order->status }}" title="{{ ucfirst($order->status) }}"></span>
                        <div class="relative">
                            <select class="status-select bg-main border border-gray-300 rounded-md p-1 outline-none" data-order-id="{{ $order->id }}">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chưa giải quyết</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy bỏ</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                            </select>
                        </div>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Ghi chú</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 ">Chi tiết đơn hàng</dt>
                    <dd class="mt-2 text-sm  sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            @foreach ($order->items as $item)
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <div class="flex w-0 flex-1 items-center">
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2 justify-between">
                                        <span class="truncate font-medium product-name"><strong>Tên sản phẩm:</strong> {{ $item->product->product_name }}</span>
                                        <span class="truncate font-medium"><strong>Số lượng:</strong> {{ $item->quantity }}</span>
                                        <span class="truncate font-medium"><strong>Giá:</strong> {{ number_format($item->price) }} VND</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

</div>

@include('admin.layout.fotter')