<style>
    .order_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('order') }}" method="GET" class="flex">
                <div>
                    <label for="startDate">From</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-4">
                    <label for="endDate">To</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"><ion-icon name="search-outline"></ion-icon></span>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search">
                    </div>
                </div>
                <div class="ml-6">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
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
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $order->id }}</td>
                <td class="px-4 py-2">{{ $order->order_date }}</td>
                <td class="px-4 py-2">{{ $order->total_amount }} VND</td>
                <td class="px-4 py-2">{{ $order->shipping_address }}</td>
                <td class="px-4 py-2">{{ $order->payment_method }}</td>
                <td class="px-4 py-2">
                    <div class="relative">
                        <select class="status-select bg-white border border-gray-300 rounded-md p-1 outline-none">
                            <option value="1" {{ $order->status == 'pending' ? 'selected' : '' }}>Chưa giải quết</option>
                            <option value="2" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="3" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy bỏ</option>
                            <option value="4" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                    </div>
                </td>
                <td class="px-4 py-2">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md detail-btn">Chi tiết</button>
                    <button class="hidden bg-green-600 text-white px-4 py-2 rounded-md update-btn">Cập nhật</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.status-select');

            selects.forEach(select => {
                select.addEventListener('change', function() {
                    const orderId = this.closest('tr').querySelector('.order-id').innerText;
                    const newStatus = this.value;

                    // Gửi yêu cầu cập nhật trạng thái đơn hàng lên server
                    fetch(`/admin/orders/${orderId}/update-status`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Đảm bảo sử dụng csrf token để bảo vệ chống CSRF attacks
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                // Xử lý thành công
                                console.log('Cập nhật thành công');
                            } else {
                                // Xử lý lỗi
                                console.error('Có lỗi xảy ra khi cập nhật');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi mạng:', error);
                        });
                });
            });
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