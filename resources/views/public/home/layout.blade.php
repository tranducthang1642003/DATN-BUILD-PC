@include('public.header.index')

<section class="banner">
    <div class="banner max-w-full pt-1  one-time">
        <img src="{{ asset('image/bannre-pc.jpg') }}" alt="" class="w-full h-auto">
        <img src="{{ asset('image/bannre-pc.jpg') }}" alt="" class="w-full h-auto">
    </div>
    <div class="post-ter px-4 md:px-8 pt-6 flex flex-wrap justify-between">
        <div class="post w-full md:w-1/2 mb-4 md:mb-0 p-2">
            <img src="https://anphat.com.vn/media/banner/31_May251c443c69dfa5f4548f1a206f5447f8.png" alt=""
                class="w-full h-48  md:h-60">
        </div>
        <div class="post w-full md:w-1/2  p-2 ">
            <img src="https://anphat.com.vn/media/banner/31_May251c443c69dfa5f4548f1a206f5447f8.png" alt=""
                class="w-full h-48 md:h-60">
        </div>
    </div>
</section>


{{-- GIÁ TỐT SIÊU SALE MỖI NGÀY --}}

<section class="product px-4 md:px-8 pt-6">
    <div class="rounded-lg shadow-2xl shadow-white bg-gradient-to-b from-orange-500 to-yellow-400"
        style="background: linear-gradient(180deg, #FF3615 0%, #FFCE00 100%);">

        <div class="text grid grid-cols-1 md:grid-cols-3 justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-amber-400">GIÁ TỐT SIÊU SALE MỖI NGÀY</div>
            <div class="text-end-sale text-lg md:text-xl font-bold text-white flex">
                kết thúc sau: @include('public.home.demgio')
            </div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>

        <div class="product-slide">
            <div class="autoplay-slider p-3">
                @foreach ($saleproduct as $product)
                    <div class="product__item">
                        <div class="bg-white rounded-lg mr-2 relative group">
                            <span class="bg-red-400 text-white rounded-full ml-3 p-2 absolute top-0 left-0">Hot</span>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img overflow-hidden">
                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}"
                                        class="w-full h-auto object-cover">
                                </div>
                            </a>
                            <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 mt-2 italic">
                                <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                            </div>
                            <div class="product-info p-3">
                                <a href="{{ route('product.show', $product->slug) }}"
                                    class="hover:text-blue-600 text-lg font-semibold leading-tight text_css">{{ $product->product_name }}</a>
                                <div class="flex items-center mt-2">
                                    <div class="text-sm text-slate-500 line-through">
                                        {{ number_format($product->price) }}</div>
                                    <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3 text-sm">
                                        {{ $product->stock }}%
                                    </div>
                                </div>
                                <div class="text-red-700 font-bold text-lg mt-2">
                                    {{ number_format($product->price) }} VND</div>
                            </div>
                            <div
                                class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div
                                    class="flex items-center justify-center h-10 w-10 bg-red-300 rounded-full text-white">
                                    @auth
                                        @if ($product->isLikedBy(auth()->user()))
                                            <form id="unlike-form" action="{{ route('deletelike', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa fa-heart"
                                                        style="color:#ff0000"></i></button>
                                            </form>
                                        @else
                                            <form id="like-form" action="{{ route('addlike') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit"><i class="fa-solid fa-heart"></i></button>
                                            </form>
                                        @endif
                                    @else
                                        <i class="fa-solid fa-heart"></i>
                                    @endauth
                                </div>
                                <p>
                                    <button class="add-to-cart-btn relative" data-product-id="{{ $product->id }}">
                                        <div
                                            class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white">
                                            <i class="fa-solid fa-shopping-cart"></i>
                                            <!-- Lớp phủ tải -->
                                            <div class="loading-overlay" style="display: none;"></div>
                                        </div>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- SẢN PHẨM BÁN CHẠY --}}

<section class="product px-8 pt-6">
    <div class="rounded-lg shadow shadow-white" style="background: linear-gradient(180deg, #0967E9 0%, #DCF6FD 100%);">
        <div class="text grid grid-cols-1 md:grid-cols-2 justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">SẢN PHẨM BÁN CHẠY</div>
            <div class="text-see-more text-sm font-bold md:text-right">Xem thêm khuyến mãi</div>
        </div>
        <div class="flex flex-wrap">
            <div class="banner-product w-full md:w-1/3">
                <div class="banner pt-5 p-3">
                    <img src="https://nguyencongpc.vn/media/banner/14_Jun052d89a09e37a950cb80b6ef2e6a4ea4.webp"
                        alt="" class="rounded-lg h-auto md:h-96 w-full">
                </div>
            </div>
            <div class="autoplay-sanpham p-5 w-full md:w-2/3">
                @foreach ($bestsellingProducts as $product)
                    <div class="product__item mb-4 md:mb-0 md:mr-4 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-1 md:h-96 ">
                        <div class="bg-white rounded-lg relative group">
                            <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute top-0 left-0">Hot</span>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img">
                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}"
                                        class="w-full h-52 object-cover">
                                </div>
                            </a>
                            <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 mt-2 italic">
                                <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                            </div>
                            <div class="product-info p-4">
                                <a href="{{ route('product.show', $product->slug) }}"
                                    class="hover:text-blue-600 text-lg font-semibold leading-tight line-clamp-2">{{ $product->product_name }}</a>
                                <div class="flex items-center mt-2">
                                    <div class="text-sm text-slate-500 line-through">
                                        {{ number_format($product->price) }}
                                        VND</div>
                                    <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3 text-sm">
                                        {{ $product->discount }}</div>
                                </div>
                                <div class="text-red-700 font-bold text-lg mt-2">
                                    {{ number_format($product->price) }} VND</div>
                            </div>
                            <div
                                class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div
                                    class="flex items-center justify-center h-10 w-10 bg-red-300 rounded-full text-white">
                                    @auth
                                        @if ($product->isLikedBy(auth()->user()))
                                            <form id="unlike-form" action="{{ route('deletelike', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa fa-heart"
                                                        style="color:#ff0000"></i></button>
                                            </form>
                                        @else
                                            <form id="like-form" action="{{ route('addlike') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit"><i class="fa-solid fa-heart"></i></button>
                                            </form>
                                        @endif
                                    @else
                                        <i class="fa-solid fa-heart"></i>
                                    @endauth
                                </div>
                                <div class="cart">
                                    <button class="add-to-cart-btn relative" data-product-id="{{ $product->id }}">
                                        <div
                                            class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white">
                                            <i class="fa-solid fa-shopping-cart"></i>
                                            <!-- Lớp phủ tải -->
                                            <div class="loading-overlay" style="display: none;"></div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- danh mục --}}

<section class="product px-8 pt-6">
    <div class="rounded-lg shadow shadow-white">
        <div class="text grid grid-cols-1 justify-between items-center px-4 md:px-8">
            <div class="text-animation text-xl md:text-2xl font-black">DANH MỤC NỖI BẬT</div>
        </div>
        <div class="Categorys px-8 pt-5 bg-yellow-50">
            <div class="autoplay-slider flex flex-wrap justify-center">
                @foreach ($featuredCategories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="flex flex-col items-center justify-center text-center m-2 md:m-4">
                        <div class="flex flex-col items-center">
                            <span class="truncate">{{ $category->category_name }}</span>
                            <div class="w-10 h-10 mt-2 mb-2 flex items-center justify-center">
                                <img src="{{ $category->image }}" alt="{{ $category->category_name }}"
                                    class="object-contain w-full h-full">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- PC GAMEMING --}}

<section class="px-8 pt-6">
    <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
        @foreach ($categories as $category)
            <div class="px-6 pt-2">
                <div class="text grid grid-cols-1 md:grid-cols-2 justify-between items-center">
                    <div class="text-sale text-xl md:text-2xl font-black text-red-500 py-2">
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->category_name }}</a>
                    </div>
                    <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
                </div>
                <div class="product-slide">
                    <div class="autoplay-slider p-3">
                        @foreach ($category->products as $product)
                            <div class="product__item">
                                <div class="bg-white rounded-lg mr-2 md:mr-4 mb-4 md:mb-0 h-auto relative group">
                                    <!-- Hot tag -->
                                    <span
                                        class="bg-red-400 text-white rounded-full ml-3 p-2 absolute top-0 left-0">Hot</span>
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <div class="product-img overflow-hidden">
                                            <img src="{{ $product->primary_image_path }}" alt="{{ $product->name }}"
                                                class="w-full h-auto object-cover">
                                        </div>
                                    </a>
                                    <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 mt-2 italic">
                                        <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                                    </div>
                                    <div class="product-info p-3">
                                        <a href="{{ route('product.show', $product->slug) }}"
                                            class="hover:text-blue-600 text-lg font-semibold leading-tight text_css">{{ $product->product_name }}</a>
                                        <div class="flex items-center mt-2">
                                            <div class="text-sm text-slate-500 line-through">
                                                {{ number_format($product->price) }} VND</div>
                                            <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3 text-sm">
                                                {{ $product->discount }}%
                                            </div>
                                        </div>
                                        <div class="text-red-700 font-bold text-lg mt-2">
                                            {{ number_format($product->price) }} VND</div>
                                    </div>
                                    <div
                                        class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        {{-- Like button --}}
                                        <div
                                            class="flex items-center justify-center h-10 w-10 bg-red-300 rounded-full text-white">
                                            @auth
                                                @if ($product->isLikedBy(auth()->user()))
                                                    <form id="unlike-form"
                                                        action="{{ route('deletelike', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="fa fa-heart"
                                                                style="color:#ff0000"></i></button>
                                                    </form>
                                                @else
                                                    <form id="like-form" action="{{ route('addlike') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <button type="submit"><i class="fa-solid fa-heart"></i></button>
                                                    </form>
                                                @endif
                                            @else
                                                <i class="fa-solid fa-heart"></i>
                                            @endauth
                                        </div>
                                        {{-- Cart button --}}
                                        <div class="cart">
                                            <button class="add-to-cart-btn relative" data-product-id="{{ $product->id }}">
                                                <div
                                                    class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white">
                                                    <i class="fa-solid fa-shopping-cart"></i>
                                                    <!-- Lớp phủ tải -->
                                                    <div class="loading-overlay" style="display: none;"></div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


<section>

    <div class="container mx-auto py-6 p-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">TIN KHUYẾN MÃI MỚI</h2>
            <a href="#" class="text-blue-500">XEM THÊM</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300x150" alt="Promotion 1" class="mb-4 rounded">
                <h3 class="text-lg font-bold">Giảm giá cực hot khi Build PC tại An Phát</h3>
                <p class="mt-2 text-green-500">Giảm giá lên tới 30.000K</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300x150" alt="Promotion 2" class="mb-4 rounded">
                <h3 class="text-lg font-bold">ĐẠI HỘI KHUYẾN MÃI LINH KIỆN MÁY TÍNH ASUS</h3>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300x150" alt="Promotion 3" class="mb-4 rounded">
                <h3 class="text-lg font-bold">Bảo Hành Plus Lâu Hơn - Yên Tâm Hơn</h3>
                <p class="mt-2 text-blue-500">+1 NĂM Bảo hành chính hãng</p>
                <p class="mt-1 text-blue-500">1000 GÓI Trị giá 2 TỶ đồng</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://via.placeholder.com/300x150" alt="Promotion 4" class="mb-4 rounded">
                <h3 class="text-lg font-bold">Quét VNPAY - Giảm Liền Tay</h3>
                <p class="mt-2 text-yellow-500">Giảm giá lên tới 200K</p>
            </div>
        </div>
    </div>
</section>



<section class="produtc px-8 pt-6">
    <div class="bg-white rounded-lg shadow-2xl shadow-white">
        <div class="autoplay-evaluate text-center">
            <div class="text-sale text-2xl md:text-2xl text-black max-w-4xl">
                <div class="text-evaluate">ĐÁNH GIÁ TỪ KHÁCH HÀNG</div>
                <div class="text-description  text-xl">
                    <p> Nguyễn Văn linh</p>
                    <img src="https://nguyencongpc.vn/media/news/0709_tienlinh.jpg" alt=""
                        class="w-36 mx-auto	px-8 rounded-r-3xl	">
                    Tôi rất hài lòng với sản phẩm máy xay sinh tố XYZ và dịch vụ của cửa hàng. Đây là một lựa chọn
                    tốt
                    cho những ai đang tìm kiếm một máy xay chất lượng với giá cả phải chăng. Tôi chắc chắn sẽ giới
                    thiệu
                    sản phẩm này cho bạn bè và người thân.
                </div>
            </div>
            <div class="text-sale text-2xl md:text-2xl text-black max-w-4xl">
                <div class="text-evaluate">ĐÁNH GIÁ TỪ KHÁCH HÀNG</div>
                <div class="text-description  text-xl">
                    <p> Nguyễn Văn linh</p>
                    <img src="https://nguyencongpc.vn/media/news/0709_tienlinh.jpg" alt=""
                        class="w-36 mx-auto	px-8 rounded-r-3xl	">
                    Tôi rất hài lòng với sản phẩm máy xay sinh tố XYZ và dịch vụ của cửa hàng. Đây là một lựa chọn
                    tốt
                    cho những ai đang tìm kiếm một máy xay chất lượng với giá cả phải chăng. Tôi chắc chắn sẽ giới
                    thiệu
                    sản phẩm này cho bạn bè và người thân.
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="pt-3 mb-5 text-xs sm:text-base container p-8">
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
</section>

<section class="pt-6">
    @include('public.footer.footer')
</section>

<style>
    @media (max-width: 768px) {
        .post-ter {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .post img {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .text {
            grid-template-columns: 1fr !important;
        }

        .text-sale,
        .text-end-sale,
        .text-see-more {
            text-align: center;
        }
    }

    .text-animation {
        animation: color-change 15s infinite;
        padding-bottom: 25px
    }

    @keyframes color-change {
        0% {
            color: #ff3300;
        }

        5.55% {
            color: #cd8a05;
        }

        11.1% {
            color: #c3ff00;
        }

        16.65% {
            color: #15ff00;
        }

        22.2% {
            color: #FFD700;
        }

        27.75% {
            color: #FFFF00;
        }

        33.3% {
            color: #ADFF2F;
        }

        38.85% {
            color: #32CD32;
        }

        44.4% {
            color: #00FF7F;
        }

        49.95% {
            color: #00FFFF;
        }

        55.5% {
            color: #1E90FF;
        }

        61.05% {
            color: #4169E1;
        }

        66.6% {
            color: #800080;
        }

        72.15% {
            color: #FF00FF;
        }

        77.7% {
            color: #FF1493;
        }

        83.25% {
            color: #FF69B4;
        }

        88.8% {
            color: #FF4500;
        }

        94.35% {
            color: #FF6347;
        }

        100% {
            color: #FF6347;
        }
    }

    .text_css {
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 25px;
        -webkit-line-clamp: 2;
        height: 50px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }

    .loading-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #ffffff;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .relative {
        position: relative;
    }
</style>


<script>
    $(document).ready(function() {
        $('.add-to-cart-btn').click(function(event) {
            event.preventDefault();
            var button = $(this);
            var overlay = button.find('.loading-overlay');
            var productId = button.data('product-id');
            overlay.show();
            $.ajax({
                url: '{{ route('cart.addToCart') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': productId,
                    'quantity': 1
                },
                success: function(response) {
                    if (response.success) {
                        $('#cart-count').text(response.totalQuantity);


                        Toastify({
                            text: 'Đã thêm sản phẩm vào giỏ hàng.',
                            duration: 3000, // Duration in milliseconds
                            close: true,
                            gravity: 'bottom', // Position: 'top', 'bottom', 'left', 'right'
                            backgroundColor: '#4CAF50', // Background color
                            stopOnFocus: true // Stop timeout when the toast is hovered
                        }).showToast();
                    } else {
                        alert('Thêm sản phẩm vào giỏ hàng không thành công: ' + response
                            .message);
                    }

                    overlay.hide();
                },
                error: function(xhr, status, error) {
                    alert('Ajax request failed: ' + error);

                    // Ẩn lớp phủ tải
                    overlay.hide();
                }
            });
        });




        var cartCount = {{ session('cart_count', 0) }};
        $('#cart-count').text(cartCount);
    });
</script>
