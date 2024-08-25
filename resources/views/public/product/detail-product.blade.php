@include('public.header.index')
<div class="product-detail__page max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <div class="detail-product__container">
        <div class="">
            <nav class="bg-white p-4 rounded-md w-full hidden lg:block">
                <ol class="list-reset flex">
                    <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
                    <li><span class="mx-2 text-black"> > </span></li>
                    <li><a href="" class="text-black hover:text-blue-800">MÀN HÌNH MÁY TÍNH</a></li>
                    <li><span class="mx-2 text-gray-500"> > </span></li>
                    <li class="text-gray-500">Màn hình Asus</li>
                </ol>
            </nav>
        </div>
        <div id="toast" class="hidden fixed bottom-0 right-0 m-8 p-2 bg-green-500 text-white rounded shadow-md">
            Thêm sản phẩm vào giỏ hàng thành công.
        </div>

        <div class="product-detail__box-content flex flex-col lg:flex-row">
            <div class="box-left grow mt-3">
                <div class="product-detail__images">
                    <div class="swiper gallery-top">
                        <div class="md:max-w-xl max-w-sm mx-auto slider-for">
                            <div class="">
                                <img class="w-32 mx-auto md:w-48" src="{{ asset($product->primary_image_path) }}">
                            </div>
                            @foreach ($secondary_images as $item)
                            <div class="">
                                <img class="w-32 mx-auto md:w-48" src="{{ asset($item->image_path) }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper gallery-thumbs mt-3 hidden lg:block">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide thumb-img max-w-lg mx-auto slider-nav">
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img class="w-32 mx-auto md:w-48" src="{{ asset($product->primary_image_path) }}">
                                </div>
                                @foreach ($secondary_images as $item)
                                <div class="">
                                    <img class="w-32 mx-auto md:w-48" src="{{ asset($item->image_path) }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-product-summary p-5 mt-3 lg:mt-5 border rounded-xl hidden lg:block">
                    <p class="title font-semibold text-lg">Thông số sản phẩm</p>
                    <ul class="list-product-summary list-disc pl-5 mt-2">
                        <li>Mã Sản phẩm: {{ $product->product_code }}</li>
                        <li>Màu hiển thị: {{ $product->color }}</li>
                        <li>Độ phân giải: {{ $product->description }}</li>
                        <li>Model: {{ $product->product_code }}</li>
                        <li>Âm thanh: {!! $product->specifications !!}</li>
                    </ul>
                </div>
            </div>
            <div class="box-right grow ml-0 md:ml-10 mt-5">
                <h1 class="detail-product_name text-base md:text-lg xl:text-xl">
                    {{ $product->product_name }}
                </h1>
                <div class="list-basic-product-info flex mt-3">
                    <div class="item-basic mr-10">
                        Bảo Hành:
                        <span class="ml-3 text-amber-400">36 tháng</span>
                    </div>
                    <span class="mr-10"> | </span>
                    <div class="item-basic">
                        Tình trạng:
                        <span class="ml-3 text-teal-400">Còn hàng</span>
                    </div>
                </div>
                <div class="item-basic">
                    Mã màu:
                    <span class="ml-3 text-red-400">{{ $product->color }}</span>
                </div>
                <div class="box-price-detail flex mt-3 border-2 rounded-2xl p-1 md:p-3">
                    <p class="price-detail text-xs lg:text-xl xl:text-4xl font-semibold text-red-700 ml-3 mr-5">
                        {{ number_format($product->price) }} VND
                    </p>
                    <span class="market-price-detail text-base md:text-lg lg:text-xl line-through text-slate-400 place-self-center mr-5">
                        4.000.000₫
                    </span>
                    <div class="save-price-detail text-base md:text-lg lg:text-xl text-red-700 place-self-center hidden lg:block">
                        Tiết kiệm 810.000đ
                    </div>
                    <div class="bg-red-700 text-red-700 font-bold rounded-full ml-3 pl-3 pr-3 place-self-center block lg:hidden">
                        -25%
                    </div>
                </div>
                <div class="detail__buy-quantity flex mt-2 md:mt-5 justify-start">
                    <div class="flex items-center space-x-4 mr-5 md:mr-10">
                        <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input class="bg-slate-200 text-black px-4 py-2 rounded-full hover:bg-amber-400" type="number" name="quantity" value="1" min="1">
                                <button class="bg-slate-200 text-black px-4 py-2 rounded-full hover:bg-amber-400" type="submit">Thêm vào giỏ hàng</button>
                            </div>
                        </form>
                        <span id="cart-count" class="text-white bg-red-500 rounded-full px-2" style="display: none;">{{ session('cart_count', 0) }}</span>
                    </div>

                </div>

                <div class="detail-buy mt-2 md:mt-5">
                    <div class="detail-buy-now border p-2 md:p-3 rounded-xl pr-5 pl-5 bg-red-600 text-white hover:bg-red-500 hover:text-white text-center">
                        <a href="" class="w-full">
                            <p class="text-base md:text-lg lg:text-xl font-semibold">ĐẶT MUA NGAY</p>
                            <span>Giao hàng tận nơi nhanh chóng</span>
                        </a>
                    </div>
                </div>
                <div class="box-product-policy-detal mt-3 md:mt-5">
                    <h1 class="font-semibold">YÊN TÂM MUA HÀNG</h1>
                    <div class="list-showroom-detail mt-2 grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="item">
                            <p><i class="fa-regular fa-handshake" style="color: #d60000;"></i> Cam kết giá tốt nhất thị
                                trường.</p>
                        </div>
                        <div class="item">
                            <p><i class="fa-solid fa-award" style="color: #d60000;"></i> Sản phẩm mới 100%.</p>
                        </div>
                        <div class="item">
                            <p><i class="fa-solid fa-repeat" style="color: #d60000;"></i> Lỗi 1 đổi 1 ngay lập tức.</p>
                        </div>
                        <div class="item">
                            <p><i class="fa-solid fa-file-invoice-dollar" style="color: #d60000;"></i> Hỗ trợ trả góp -
                                Thủ tục nhanh gọn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-read-product-detail mt-3 md:mt-5 grid gap-1 grid-cols-1 md:grid-cols-2">
            <div class="box-left">
                <div class="mx-auto rounded-xl border shadow p-3 md:p-5">
                    <h1 class="text-xl font-bold mb-4">Đánh giá sản phẩm</h1>
                    <form action="{{ route('products.reviews.store', ['product' => $product->id]) }}" method="POST" class="bg-white">
                        @csrf

                        @if (!auth()->check())
                        <div class="mb-2">
                            <label for="name" class="block text-gray-700 font-bold mb-1">Tên bạn</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block text-gray-700 font-bold mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="">
                        </div>
                        @endif

                        <div class="mb-2">
                            <label for="rating" class="block text-gray-700 font-bold mb-1">Đánh giá</label>
                            <div class="flex items-center">
                                <input type="radio" id="star1" name="rating" value="1" class="hidden" />
                                <label for="star1" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-500">★</label>
                                <input type="radio" id="star2" name="rating" value="2" class="hidden" />
                                <label for="star2" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-500">★</label>
                                <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                                <label for="star3" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-500">★</label>
                                <input type="radio" id="star4" name="rating" value="4" class="hidden" />
                                <label for="star4" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-500">★</label>
                                <input type="radio" id="star5" name="rating" value="5" class="hidden" />
                                <label for="star5" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-500">★</label>
                            </div>
                        </div>

                        <div class="mb-2">
                            <textarea id="comment" name="comment" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-amber-400 resize-none" placeholder="Mời bạn để lại đánh giá"></textarea>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="w-full bg-amber-400 text-white font-bold py-2 px-4 rounded-lg hover:bg-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-400 focus:ring-opacity-50">
                                Gửi đánh giá
                            </button>
                        </div>
                    </form>
                    @if (session('success'))
                    <div id="alert" class="border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md" style="background-color: #4CAF50; color: #fff" role="alert">
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                    @elseif (session('error'))
                    <div id="alert" class="border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md" style="background-color: #f44336; color: #fff" role="alert">
                        <p class="font-bold">{{ session('error') }}</p>
                    </div>
                    @endif
                </div>
                <div class="mt-3">
                    <div class="bg-white p-4 rounded-xl border shadow mb-4">
                        @forelse ($reviews as $review)

                        <div class="flex justify-between mt-3 pb-3" style="border-bottom: 1px ridge;">
                            <div class="flex space-x-2">
                                <img src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/8-anh-dai-dien-trang-inkythuatso-03-15-26-54.jpg" alt="" class="w-10 h-10 rounded-full object-cover">
                                <div class="items-center space-x-1 ml-3">
                                    <span class="text-gray-700 font-bold">{{ $review->user->name ?? 'Người dùng ẩn danh' }}</span>
                                    <div class="flex mt-2">
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                                <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="#FFD700"></polygon>
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                                <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                            </svg>
                                            @endif
                                            @endfor
                                    </div>
                                    <p class="mt-2 text-gray-800">{{ $review->comment }}</p>
                                </div>
                            </div>
                            <span class="text-gray-500 text-sm">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <p class="text-gray-600">Chưa có đánh giá nào cho sản phẩm này.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="box-right">
                <div class="banner ml-3">
                    <img src="https://nguyencongpc.vn/media/banner/03_Jun02e5bf3d96bd8a662973c555f5c9036f.webp" alt="" class="rounded-lg w-full">
                    <img src="https://nguyencongpc.vn/media/banner/03_Jun7b279ff5b996fdf294b2bf0ffbc78e52.webp" alt="" class="rounded-lg w-full mt-3">
                </div>
            </div>
        </div>
        <div class="product__container">
            <div class="product__list">
                <h2 class="text-base md:text-xl lg:text-2xl xl:text-3xl font-bold mt-8 mb-4">Sản phẩm tương tự</h2>
                <div class="flex flex-wrap -mx-2">
                    @foreach ($similarProducts as $product)
                    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 p-2">
                        <div class="bg-white rounded-lg border shadow-md p-4 h-full relative group">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img">
                                    <img src="{{ asset($product->primary_image_path) }}" alt="Primary Image">
                                </div>
                                <div class="product-info mt-2">
                                    <h3 class="text-sm font-semibold">{{ $product->product_name }}</h3>
                                    <p class="text-gray-500 text-xs">{{ $product->short_description }}</p>
                                    <div class="mt-1">
                                        <span class="text-red-700 font-bold">
                                            {{ number_format($product->price) }} VND
                                        </span>
                                        @if ($product->discount)
                                        <span class="text-gray-500 line-through ml-2">{{ $product->discount }}</span>
                                        @endif
                                    </div>
                                    <div class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        {{-- like --}}
                                        <div class="flex items-center justify-center h-10 w-10 bg-red-300 rounded-full text-white">
                                            @if ($likeItem && $likeItem->contains('product_id', $product->id))
                                        <form action="{{ route('deletelike', $likeItem->where('product_id', $product->id)->first()->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-dark btn-square">
                                                <i class="fa fa-heart" style="color:#ff0000"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="like-form" action="{{ route('addlike') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit">
                                                <i class="fa-solid fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                        </div>
                                        {{-- end like --}}
                                        {{-- cart --}}
                                        <div class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white mt-2">
                                            <i class="fa-solid fa-shopping-cart"></i>
                                        </div>
                                        {{-- end cart --}}
                                    </div>
                                </div>
                            </a>
                            @if ($product->reviews->isNotEmpty())
                            @php
                            $averageRating = $product->reviews->avg('rating');
                            $totalStars = 5;
                            $fullStars = floor($averageRating);
                            $emptyStars = $totalStars - $fullStars;
                            @endphp

                            <div class="rating flex">
                                <div class="flex items-center pt-1">
                                    @for ($i = 0; $i < $fullStars; $i++) <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                        <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="#FFD700"></polygon>
                                        </svg>
                                        @endfor
                                        @for ($i = 0; $i < $emptyStars; $i++) <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                            </svg>
                                            @endfor
                                </div>
                                <p>({{ $product->reviews->count() }} đánh giá)</p>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product__container">
            <div class="product__list">
                <h2 class="text-base md:text-xl lg:text-2xl xl:text-3xl font-bold mt-8 mb-4">Sản phẩm đã xem</h2>
                <div class="flex flex-wrap -mx-2">
                    @foreach ($recentlyViewedProducts as $product)
                    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 p-2">
                        <div class="bg-white rounded-lg border shadow-md p-4 h-full relative group">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img">
                                    <img class="w-full h-48 object-cover" src="{{ asset($product->primary_image_path) }}" alt="{{ $product->product_name }}">
                                </div>
                                <div class="product-info mt-2">
                                    <h3 class="text-sm font-semibold">{{ $product->product_name }}</h3>
                                    <p class="text-gray-500 text-xs">{{ $product->short_description }}</p>
                                    <div class="mt-1">
                                        <span class="text-red-700 font-bold">
                                            {{ number_format($product->price) }} VND
                                        </span>
                                        @if ($product->discount)
                                        <span class="text-gray-500 line-through ml-2">{{ $product->discount }}</span>
                                        @endif
                                    </div>
                                    <div class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        {{-- like --}}
                                        <div class="flex items-center justify-center h-10 w-10 bg-red-300 rounded-full text-white">
                                            @if ($likeItem && $likeItem->contains('product_id', $product->id))
                                            <form action="{{ route('deletelike', $likeItem->where('product_id', $product->id)->first()->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-dark btn-square">
                                                    <i class="fa fa-heart" style="color:#ff0000"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form id="like-form" action="{{ route('addlike') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </form>
                                        @endif
                                        </div>
                                        {{-- end like --}}
                                        {{-- cart --}}
                                        <div class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white mt-2">
                                            <i class="fa-solid fa-shopping-cart"></i>
                                        </div>
                                        {{-- end cart --}}
                                    </div>
                                </div>
                            </a>
                            @if ($product->reviews->isNotEmpty())
                            @php
                            $averageRating = $product->reviews->avg('rating');
                            $totalStars = 5;
                            $fullStars = floor($averageRating);
                            $emptyStars = $totalStars - $fullStars;
                            @endphp

                            <div class="rating flex">
                                <div class="flex items-center pt-1">
                                    @for ($i = 0; $i < $fullStars; $i++) <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                        <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="#FFD700"></polygon>
                                        </svg>
                                        @endfor
                                        @for ($i = 0; $i < $emptyStars; $i++) <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                            </svg>
                                            @endfor
                                </div>
                                <p>({{ $product->reviews->count() }} đánh giá)</p>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pt-3 mb-5 text-xs sm:text-base">
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
</div>
@include('public.footer.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButton = document.querySelector('form button[type="submit"]');
        const cartModal = document.getElementById('cart-modal');
        const closeModalButton = document.getElementById('close-modal');
        const body = document.body;

        addToCartButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission for demo purposes
            cartModal.classList.remove('hidden');
            body.classList.add('blur-background');
        });

        closeModalButton.addEventListener('click', function() {
            cartModal.classList.add('hidden');
            body.classList.remove('blur-background');
        });
    });



    $(document).ready(function() {
        $('#add-to-cart-form').submit(function(event) {
            event.preventDefault(); // Ngăn form submit thông thường

            $.ajax({
                url: $(this).attr('action'), // Lấy URL từ action của form
                method: $(this).attr('method'), // Lấy method từ form
                data: $(this).serialize(), // Lấy dữ liệu từ form
                success: function(response) {
                    if (response.success) {
                        // Nhảy số lượng giỏ hàng lên
                        animateCartCount();

                        // Hiển thị Toast notification (nếu cần)
                        showToast();
                    } else {
                        alert('Không thể thêm sản phẩm vào giỏ hàng.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Yêu cầu AJAX thất bại: ' + error);
                }
            });
        });

        function animateCartCount() {
            var cartCountElement = $('#cart-count');
            var currentCount = parseInt(cartCountElement.text()) || 0;
            var newCount = currentCount + 1;

            cartCountElement.text(newCount).fadeIn().delay(100).fadeOut().fadeIn();
        }

        function showToast() {
            var toast = $('#toast');
            toast.removeClass('hidden');
            setTimeout(function() {
                toast.addClass('hidden');
            }, 3000);
        }


        function updateCartCount(cartCount) {
            if (cartCount > 0) {
                $('#cart-count').text(cartCount).show();
            } else {
                $('#cart-count').hide();
            }
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.flex .cursor-pointer');
        const ratingInput = document.querySelector('input[name="rating"]');

        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                const ratingValue = index + 1;
                ratingInput.value = ratingValue;

                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-yellow-500');
                    } else {
                        s.classList.remove('text-yellow-500');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });
    });
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 5000);
</script>