@include('public.dashboard.layout.header')
<style>
    .table-fixed {
        table-layout: fixed;
        width: 100%;
    }

    .whitespace-normal {
        word-wrap: break-word;
        word-break: break-all;
    }
</style>

@if (session('success_message'))
    <div id="success_message"
        class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white px-4 py-2 rounded shadow-md transition-transform transform duration-500 ease-out">
        {{ session('success_message') }}
    </div>
    @endif
<div class="bg-white p-4 col-span-7 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold mb-4 bg-blue-200 flex justify-center items-center p-3 rounded-lg shadow-lg">Trang Đơn Hàng Của Tôi</h1> 
    <div class="w-full table-responsive mb-5">

        <table
            class="w-full bg-white border border-gray-200 divide-y divide-gray-200 text-center hover:border-spacing-2 table-fixed ">
            <thead class="bg-yellow-400 text-black">
                <tr>
                    <th class="py-2">Tên người đặt</th>
                    <th class="py-2">Tổng Giá</th>
                    <th class="py-2">Phương thức thanh toán</th>
                    <th class="py-2">Mã đơn hàng</th>
                    <th class="py-2">Trạng thái đơn hàng</th>
                </tr>
            </thead>

            <tbody class="align-middle">
                @foreach ($OrderItem as $item)
                <tr class="border">
                    <td class="py-2">{{ $item->full_name }}</td>
                    <td class="py-2">{{ $item->total_amount }}</td>
                    <td class="py-2">{{ $item->payment_method }}</td>
                    <td class="py-2">{{ $item->order_code }}</td>
                    <td class="py-2">{{ $item->status }}</td>

                </tr>
                @endforeach
                    
            </tbody>
           
        </table>
        <div class="pagination">
            {{$OrderItem->links() }}
        </div>
    </div>
</div>
@include('public.dashboard.layout.footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('success_message');
        if (element) {
            // Di chuyển từ phải sang trái
            element.style.transform = 'translateX(0)';
            // Chờ 5 giây sau đó ẩn đi
            setTimeout(function() {
                element.style.transform = 'translateX(100%)';
                setTimeout(function() {
                    element.remove(); // Xóa phần tử thông báo
                }, 500); // Thời gian chờ ẩn đi
            }, 5000); // Thời gian chờ tồn tại
        }
    });
</script>