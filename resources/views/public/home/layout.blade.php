@include('public.header.index')

<section class="banner">
    <div class="banner max-w-full pt-1 autoplay">
        <img src="{{ asset('image/bannre-pc.jpg') }}" alt="" class="w-full h-auto">
        <img src="{{ asset('image/bannre-pc.jpg') }}" alt="" class="w-full h-auto">
    </div>
    <div class="post-ter px-8 pt-6 flex flex-wrap justify-between">
        <div class="post w-full md:w-1/2">
            <img src="https://anphat.com.vn/media/banner/31_May251c443c69dfa5f4548f1a206f5447f8.png" alt=""
                class="w-full h-48 px-5 md:px-2">
        </div>
        <div class="post w-full md:w-1/2">
            <img src="https://anphat.com.vn/media/banner/31_May251c443c69dfa5f4548f1a206f5447f8.png" alt=""
                class="w-full h-48 px-5 md:px-2">
        </div>
    </div>
</section>
{{-- GIÁ TỐT SIÊU SALE MỖI NGÀY --}}
<section class="product px-8 pt-6">
    <div class="rounded-lg shadow-2xl shadow-white"
        style="background: linear-gradient(180deg, #FF3615 0%, #FFCE00 100%);">
        <div class="text grid-cols-1 md:grid-cols-3 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-amber-400">GIÁ TỐT SIÊU SALE MỖI NGÀY</div>
            <div class="text-end-sale text-lg md:text-xl font-bold  text-white  flex">kết thúc sau:
                @include('public.home.demgio')</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                @foreach ($saleproduct as $product)
                    <div class="product__item">
                        <div class="bg-white rounded-lg mr-2">
                            <!-- Assuming you want to display a hot tag -->
                            <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img w-48 mx-auto">
                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}">
                                </div>
                            </a>
                            <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic">
                                <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                            </div>
                            <div class="product-info p-3 h-40">
                                <a href="{{ route('product.show', $product->slug) }}"
                                    class="hover:text-blue-600 text-base h-16 line-clamp-2 text_css">{{ $product->product_name }}</a>
                                <div class="mt-3 inline-flex">
                                    <div>
                                        <p class="product-price line-through text-slate-500">
                                            {{ number_format($product->price) }}
                                        </p>
                                    </div>
                                    <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                        {{ $product->discount }}
                                    </div>
                                </div>
                                <div class="text-red-700 font-bold text-2xl mt-2">{{ $product->price }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- SẢN PHẨM BÁN CHẠY --}}
<section class="produtc px-8 pt-6">
    <div class=" rounded-lg shadow shadow-white"
        style="    background: linear-gradient(180deg, #0967E9 0%, #DCF6FD 100%);">
        <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">SẢN PHẨM BÁN CHẠY</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="flex flex-wrap">
            <div class="banner-poduct w-full md:w-1/3">
                <div class="banner pt-5 p-3">
                    <img src="https://nguyencongpc.vn/media/banner/14_Jun052d89a09e37a950cb80b6ef2e6a4ea4.webp"
                        alt="" class="rounded-lg h-96 w-full">
                </div>
            </div>
            <div class="autoplay-sliderr p-5 w-full md:w-2/3 h-96">
                @foreach ($bestsellingProducts as $product)
                    <div class="product__item">
                        <div class="bg-white rounded-lg mr-2 h-96">
                            <!-- Assuming you want to display a hot tag -->
                            <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="product-img w-48 mx-auto">
                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}">
                                </div>
                            </a>
                            <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic">
                                <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                            </div>
                            <div class="product-info p-4 h-40">
                                <a href="{{ route('product.show', $product->slug) }}"
                                    class="hover:text-blue-600 text-base h-16 line-clamp-2 text_css">{{ $product->product_name }}</a>
                                <div class="mt-3 inline-flex">
                                    <div>
                                        <p class="product-price line-through text-slate-500">
                                            {{ number_format($product->price) }},000 VNĐ
                                        </p>
                                    </div>
                                    <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                        {{ $product->discount }}
                                    </div>
                                </div>
                                <div class="text-red-700 font-bold text-2xl mt-2">{{ $product->price }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
{{-- danh mục --}}
<section class="produtc px-8 pt-6">
    <div class="rounded-lg shadow shadow-white">
        <p>
        <div class="text grid grid-cols-1 justify-between items-center">
            <div class="text-animation text-xl md:text-2xl font-black">DANH MỤC NỖI BẬT</div>
        </div>
        </p>
        <div class="Categorys px-8 pt-5 bg-yellow-50 h-28 flex flex-wrap items-center justify-center">
            <div class="autoplay-slider w-full flex justify-center">
                @foreach ($featuredCategories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="flex flex-col items-center justify-center text-center mr-4">
                        <div class="flex flex-col-reverse items-center">
                            <span class="truncate">{{ $category->category_name }}</span>
                            <div class="w-10 h-10 mb-2 flex items-center justify-center">
                                <img src="{{ $category->image }}" alt="{{ $category->category_name }}"
                                    class="object-contain">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- PC GAMEMING --}}
<section>
    <div class="produtc px-8 pt-6">
        <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
            @foreach ($categories as $category)
                <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
                    <div class="text-sale text-xl md:text-2xl font-black text-red-500 py-2">
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->category_name }}</a>
                    </div>
                    <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
                </div>
                <div class="product-slide">
                    <div class="autoplay-slider p-3">
                        @foreach ($category->products as $product)
                            <div class="product__item">
                                <div class="bg-white rounded-lg mr-2">
                                    <!-- Assuming you want to display a hot tag -->
                                    <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <div class="product-img w-48 mx-auto ">
                                            <img src="{{ $product->primary_image_path }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    </a>
                                    <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic">
                                        <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Siêu SALE
                                    </div>
                                    <div class="product-info p-3 h-40">
                                        <a href="{{ route('product.show', $product->slug) }}"
                                            class="hover:text-blue-600 text-base h-16 line-clamp-2 text_css">{{ $product->product_name }}</a>
                                        <div class="mt-3 inline-flex">
                                            <div>
                                                <p class="product-price line-through text-slate-500">
                                                    {{ number_format($product->price) }}
                                                </p>
                                            </div>
                                            <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                                {{ $product->discount }}
                                            </div>
                                        </div>
                                        <div class="text-red-700 font-bold text-2xl mt-2">{{ $product->price }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
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
</style>