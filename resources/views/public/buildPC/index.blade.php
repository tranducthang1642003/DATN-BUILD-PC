@include('public.header.index')
<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <!-- Breadcrumb Navigation -->
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > BUILD PC </span></li>
        </ol>
    </nav>

    <!-- Product Banner -->
    <section>
        <div class="product__banner">
            <div class="one-time mt-3 w-full max-w-max h-96 ">
                @foreach($banners_top as $banner)
                    <img src="{{ $banner->images_url }}" alt="{{ $banner->alt_text }}" class="h-96">
                @endforeach
            </div>
        </div>
    </section>

    
    <div class="text-center p-5">
        <h1 class="text-2xl font-semibold">Build PC - Xây dựng cấu hình máy tính mạnh - giá rẻ nhất</h1>
        <p class="italic">( Vui lòng chọn linh kiện bạn cần để xây dựng cấu hình máy tính riêng cho bạn )</p>
    </div>


        <!-- Include this script at the bottom of your blade file -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('saveConfigurationForm');
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const messageDiv = document.getElementById('successMessage');
                                messageDiv.innerHTML = data.message;
                                messageDiv.classList.remove('hidden');

                                const viewConfigButton = document.getElementById('viewConfigurationButton');
                                viewConfigButton.href = `/buildpc/view/${data.configuration_id}`;
                                viewConfigButton.classList.remove('hidden');
                            } else {
                                alert('Error saving configuration.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>






            
    <section>
        <div class="shadow-md rounded mb-4 border">
            <table class="min-w-full divide-y divide-gray-200 border-collapse border border-slate-500">
                <tbody>
                    @foreach ($Productandcategory  as $category)
                    <td class="py-3 px-6 border border-slate-600 uppercase font-medium text-center" style="width: 20%;">
    <div class="flex flex-col items-center justify-center space-y-2">
        <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="object-contain w-20 h-20">
        <span>{{ $category->category_name }}</span>
    </div>
</td>

                                            <td class="py-3 px-6 text-right flex justify-between " style="align-items: center;">
                                                @php
                                                    $hasProduct = false;
                                                @endphp
                                                @foreach ($configurationItems as $index => $item)
                                                                    @if ($item['category_id'] == $category->id)
                                                                                        @php
                                                                                            $hasProduct = true;
                                                                                        @endphp
                                                                                        <img src="{{ $item['image_path'] }}" alt="{{ $item['product']->product_name }} "
                                                                                            class="w-48 p-2 text">
                                                                                        <div class="content-center px-5" style="text-align: justify; margin-right: auto;">
                                                                                            <p class="font-medium">{{ $item['product']->product_name }}</p>
                                                                                            Mã sản phẩm: {{ $item['product']->product_code }} <br>
                                                                                           giá: {{ $item['product']->price }}
                                                                                        </div>
                                                                    @endif
                                                @endforeach
                                                @if ($hasProduct)
                                                    @foreach ($configurationItems as $index => $item)
                                                        @if ($item['category_id'] == $category->id)
                                                            <form action="{{ route('buildpc.remove', ['index' => $index]) }}" method="POST"
                                                                class="content-center px-8">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Xóa</button>

                                                            </form>
                                                            <button
                                                                class="bg-blue-500 hover:bg-red-600 text-white px-3 py-1 rounded flex h-8"
                                                                onclick="openModal('modelConfirm{{ $category->id }}')">
                                                              <i class="fas fa-wrench fa-spin"></i>
                                                            </button>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button
                                                        class="bg-red-500 text-white rounded-md px-4 py-2 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300 flex"
                                                        onclick="openModal('modelConfirm{{ $category->id }}')">
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
            <div id="modelConfirm{{ $category->id }}"
                class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal">
                <div class="relative top-10 mx-auto shadow-xl rounded-md bg-white w-full lg:w-3/4">
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm{{ $category->id }}')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6 pt-0 text-center">
                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">{{ $category->category_name }}</h3>
                        <div class="flex">
                            <!-- <div class="w-1/4 p-4 border-r border-gray-300">
                                <h4 class="text-lg font-medium mb-4">Chọn linh kiện</h4>
                                <form id="filterForm" method="GET" action="{{ route('buildpc') }}"
                                    class="text-left space-y-4">
                                    <div>
                                        <h5 class="text-md font-medium mb-2">Thương hiệu</h5>
                                        <div class="space-y-2">
                                            @foreach($brands as $brand)
                                                <label class="block">
                                                    <input type="checkbox" name="brand[]" value="{{ $brand->brand_name }}"
                                                        class="mr-2">{{ $brand->brand_name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </form>

                                
                            </div> -->
                            <div class="w-auto p-4 overflow-y-auto">
                                @if ($category->products->isEmpty())
                                    <p>Không có sản phẩm nào.</p>
                                @else
                                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                                        @foreach ($category->products as $product)
                                            <form action="{{ route('add-component') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                <div class="border border-gray-300 rounded p-4 " style="height: 500px;">
                                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}"
                                                        class="w-full h-48 object-cover mb-2">
                                                    <h3 class="text-lg font-medium">{{ Str::limit($product->product_name ,350)}}</h3>
                                                    <p class="text-gray-600">{{ number_format($product->price) }} VND</p>
                                                    <div class="mt-2 flex items-center space-x-4">
                                                        <label for="quantity" class="text-sm font-medium">Số lượng:</label>
                                                        <input type="number" id="quantity" name="quantity" value="1"
                                                            class="w-20 border-gray-300 rounded-md py-1 px-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-600 text-white rounded px-3 py-2 font-semibold transition duration-300">Thêm
                                                            vào linh kiện</button>
                                                    </div>
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
        <div class="text-left">
<form id="saveConfigurationForm" action="{{ route('save-configuration') }}" method="POST">
            @csrf
            <input type="text" name="configuration_name" required placeholder="Tên cấu hình">
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Lưu cấu hình</button>
        </form>

        <div id="successMessage" class="hidden bg-green-500 text-white rounded px-4 py-2 mt-4"></div>
        <a id="viewConfigurationButton" href="#" class="hidden bg-blue-500 text-white rounded px-4 py-2 mt-4">Xem cấu
            hình</a>
</div>
    </section>
    <div class="container">
        <div class="flex justify-end">
            <h3 class="mr-1 py-2 px-5 mb-5 bg-red-500 text-white text-end font-medium">Tổng tiền:</h3>
            <span class="py-2 px-5 mb-5 bg-red-500 text-white text-end font-medium ">{{ number_format($totalPrice) }}
                VND</span>
        </div>

        <div class="text-end">
            <form action="{{ route('cart.add-multiple') }}" method="POST" style="float: end;">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm
                    vào giỏ hàng</button>
            </form>
        </div>


        <section>
        <div class="container mx-auto py-6 p-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">TIN KHUYẾN MÃI MỚI</h2>
                <a href="{{ route('blog.index') }}" class="text-blue-500">XEM THÊM</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($blogs as $blog)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ $blog->blog_image }}" alt="{{ $blog->title }}" class="mb-4 rounded">
                    <h3 class="text-lg font-bold">{{ $blog->title }}</h3>
                        <p class="mt-2 text-green-500">{{ Str::limit($blog->excerpt, 50) }}</p>
                        <a href="{{ route('blog.project_show', $blog->slug) }}" class="text-blue-500 mt-2 inline-block">Đọc thêm</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
        <div class="pt-3 mb-5">
            <div class="grid gap-4 mt-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 text-xs sm:text-base">
                <div class="item border rounded-lg">
                    <p class="text-center p-5 ">
                        <i class="fa-solid fa-truck"></i>
                        <b>CHÍNH SÁCH GIAO HÀNG</b><br>
                        <span>Nhận Hàng Và Thanh Toán Tại Nhà</span>
                    </p>
                </div>
                <div class="item border rounded-lg">
                    <p class="text-center p-5 ">
                        <i class="fa-solid fa-repeat"></i>
                        <b>ĐỔI TRẢ DỄ DÀNG</b><br>
                        <span>1 Đổi 1 Trong 15 Ngày</span>
                    </p>
                </div>
                <div class="item border rounded-lg">
                    <p class="text-center p-5 ">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <b>THANH TOÁN TIỆN LỢI</b><br>
                        <span>Tiền Mặt, CK, Trả Góp 0%</span>
                    </p>
                </div>
                <div class="item border rounded-lg">
                    <p class="text-center p-5 ">
                        <i class="fa-solid fa-headphones"></i>
                        <b>HỖ TRỢ NHIỆT TÌNH</b><br>
                        <span>Tư Vấn, Giải Đáp Mọi Thắc Mắc</span>
                    </p>
                </div>
            </div>
        </div>
    </div>




  

    @include('public.footer.footer')

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>


