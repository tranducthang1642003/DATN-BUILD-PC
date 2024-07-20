@include('public.header.index')

<div class="container mx-auto">
    <div class="flex justify-center pt-10">
        <div class="w-full max-w-md">
            <div class="bg-white p-8 border shadow-md">
                <div class="border-b-2 p-2 mb-4 border-yellow-500">
                    <h1 class="text-3xl font-bold text-orange-600">Tra cứu đơn hàng</h1>
                </div>
                @if (session('error'))
                    <div class="alert alert-success mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <form action="{{ route('orders.lookup') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="order-code" class="block text-lg font-medium text-gray-700">Mã đơn hàng</label>
                        <input id="order-code" name="order_code" type="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nhập mã đơn hàng" required>
                    </div>
                    <div>
                        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">Tra cứu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('public.footer.footer')
