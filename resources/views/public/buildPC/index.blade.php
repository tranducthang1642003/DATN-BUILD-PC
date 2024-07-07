@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > BUILD PC </span></li>
        </ol>
    </nav>
    <section>
        <div class="product__banner">
            <div class="mt-3 slider autoplay w-full max-w-max">
                <div><a href="" class=""> <img class="rounded-lg"
                            src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg"
                            alt=""> </a></div>
                <div><a href="" class=""> <img class="rounded-lg"
                            src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg"
                            alt=""> </a></div>
            </div>
        </div>
    </section>
    <div class="flex justify-start mb-4 space-x-4">
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Chọn CPU</button>
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Chọn Mainboard</button>
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Chọn VGA</button>
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Chọn RAM</button>
    </div>
    <section>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody>
                    @foreach ($Productandcategory as $category)
                        <tr class="border-b">
                            <td class="py-4 px-6">
                                <ul>
                                    <li>{{ $category->category_name }}</li>
                                </ul>
                            </td>
                            <td class="py-4 px-6 text-right">
                                @php
                                    $hasProduct = false;
                                @endphp
                                @foreach ($configurationItems as $index => $item)
                                    @if ($item['category_id'] == $category->id)
                                        @php
                                            $hasProduct = true;
                                        @endphp
                                        <p>{{ $item['product']->product_name }}</p>
                                        <img src="{{ $item['image_path'] }}" alt="{{ $item['product']->product_name }} " class="w-20 h-20 p-2 text">
                                    @endif
                                @endforeach
                                
                                @if ($hasProduct)
                                    @foreach ($configurationItems as $index => $item)
                                        @if ($item['category_id'] == $category->id)
                                            <form action="{{ route('buildpc.remove', ['index' => $index]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Xóa</button>
                                            </form>
                                        @endif
                                    @endforeach
                                @else
                                    <button class="bg-red-500 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition flex" onclick="openModal('modelConfirm{{ $category->id }}')">
                                        {{ $category->category_name }}
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($Productandcategory as $category)
            <div id="modelConfirm{{ $category->id }}" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal">
                <div class="relative top-10 mx-auto shadow-xl rounded-md bg-white w-full lg:w-3/4">
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm{{ $category->id }}')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6 pt-0 text-center">
                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">{{ $category->category_name }}</h3>
                        <div class="flex">
                            <div class="w-1/4 p-4 border-r border-gray-300">
                                <h4 class="text-lg font-medium mb-4">Chọn linh kiện</h4>
                                <div class="text-left">
                                    <div class="mb-4">
                                        <h5 class="text-md font-medium mb-2">Thương hiệu</h5>
                                        <div>
                                            <label class="block">
                                                <input type="checkbox" class="mr-2">Brand 1
                                            </label>
                                            <label class="block">
                                                <input type="checkbox" class="mr-2">Brand 2
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="text-md font-medium mb-2">Giá</h5>
                                        <div>
                                            <label class="block">
                                                <input type="checkbox" class="mr-2">0 - 2,000,000 VND
                                            </label>
                                            <label class="block">
                                                <input type="checkbox" class="mr-2">2,000,000 - 4,000,000 VND
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-3/4 p-4 overflow-y-auto">
                                @if ($category->products->isEmpty())
                                    <p>Không có sản phẩm nào.</p>
                                @else
                                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 ">
                                        @foreach ($category->products as $product)
                                            <form action="{{ route('add-component') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                <div class="border border-gray-300 rounded p-4">
                                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover mb-2">
                                                    <h3 class="text-lg font-medium">{{ $product->product_name }}</h3>
                                                    <p class="text-gray-600">{{ number_format($product->price) }} VND</p>
                                                    <div class="mt-2">
                                                        <label for="quantity" class="text-sm">Số lượng:</label>
                                                        <input type="number" id="quantity" name="quantity" value="1" class="w-16 border-gray-300 rounded-md py-1 px-2 text-sm focus:outline-none focus:border-blue-500">
                                                    </div>
                                                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 mt-2">Thêm vào linh kiện</button>
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <div class="container">
        <h3>Total Price: {{ number_format($totalPrice) }} VND</h3>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Xác nhận</button>
    </div>
    <br>
    <form action="{{ route('cart.add-multiple') }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm vào giỏ hàng</button>
    </form>
    
</div>

@include('public.footer.footer')
<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
    }

    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none';
            });
        }
    };
</script>
