<style>
    .order_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="mx-8 pt-20 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('order') }}"><span>Đơn hàng</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Danh sách</span>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
    <div class="flex justify-between text-sm">
        <div class="flex text-white">
            <form action="{{ route('order') }}" method="GET" class="flex">
                <div class="ml-2 sm:ml-4 flex">
                    <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-2 sm:ml-4 flex">
                    <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
                    <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-white sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full bg-main rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-white ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 hover:text-black text-slate-700 px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm text-slate-700 font-medium">
        <thead>
            <tr class="text-left bg-primary">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Mã đơn hàng</th>
                <th class="px-4 py-2">Ngày tạo</th>
                <th class="px-4 py-2">Tổng tiền</th>
                <th class="px-4 py-2">Địa chỉ</th>
                <th class="px-4 py-2">Phương thức TT</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
            <tr class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-pale-dark' }} order-row" data-status="{{ $order->status }}">
                <td class="px-4 py-2">
                    <input type="checkbox" name="orders[]" value="{{ $order->id }}">
                </td>
                <td class="px-4 py-2">{{ $order->id }}</td>
                <td class="px-4 py-2">{{ $order->order_code }}</td>
                <td class="px-4 py-2">{{ date('d/m/Y', strtotime($order->order_date)) }}</td>
                <td class="px-4 py-2">{{ $order->total_amount }} VND</td>
                <td class="px-4 py-2">{{ $order->shipping_address }}</td>
                <td class="px-4 py-2">{{ $order->payment_method }}</td>
                <td class="px-4 py-2 status-cell flex">
                    <span class="status-indicator mt-3 {{ $order->status }}" title="{{ ucfirst($order->status) }}"></span>
                    <div class="relative">
                        <select class="status-select bg-primary border-0 rounded-md p-1" data-order-id="{{ $order->id }}">
                            <option class="p-2" value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chưa giải quyết</option>
                            <option class="p-2" value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option class="p-2" value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy bỏ</option>
                            <option class="p-2" value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                    </div>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('show_order', ['id' => $order->id]) }}"><button class="bg-brown hover:bg-blue-500 text-white px-4 py-2 rounded-md detail-btn">Chi tiết</button></a>
                    <form class="hidden update-form" method="POST" action="{{ route('admin.orders.update_status', ['order' => $order->id]) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="new_status" class="bg-white border border-gray-300 rounded-md p-1 outline-none ">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md update-btn">Cập nhật</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelects = document.querySelectorAll('.status-select');
            statusSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const orderId = this.dataset.orderId;
                    const newStatus = this.value;

                    const parentRow = this.closest('tr');
                    const detailBtn = parentRow.querySelector('.detail-btn');
                    const updateForm = parentRow.querySelector('.update-form');

                    const statusInput = updateForm.querySelector('input[name="new_status"]');
                    statusInput.value = newStatus;

                    detailBtn.classList.add('hidden');
                    updateForm.classList.remove('hidden');

                    const statusCell = parentRow.querySelector('.status-cell');
                    const statusIndicator = statusCell.querySelector('.status-indicator');

                    statusIndicator.className = `status-indicator ${newStatus}`;
                    statusIndicator.title = ucfirst(newStatus);
                });
            });

            function ucfirst(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }
        });
    </script>

    <div class="flex justify-end mr-8">
        <div>
            {{ $orders->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')