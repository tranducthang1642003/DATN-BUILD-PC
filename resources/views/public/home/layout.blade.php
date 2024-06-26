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
<section class="produtc px-8 pt-6">
    <div class="bg-yellow-400 rounded-lg shadow-2xl shadow-white">
        <div class="text grid-cols-1 md:grid-cols-3 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">GIÁ TỐT SIÊU SALE MỖI NGÀY</div>
            <div class="text-end-sale text-lg md:text-xl font-bold text-red-600">Kết thúc sau 01:02:05:04</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic"><i
                                        class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Siêu SALE</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 text-base">{{ $product['title'] }}</a>
                                    <div class="mt-3 inline-flex">
                                        <div>
                                            <p class="product-price line-through text-slate-500">
                                                {{ $product['old_price'] }}</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            {{ $product['discount'] }}
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-2xl mt-2">{{ $product['new_price'] }}</div>
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
    <div class="bg-cyan-400 rounded-lg shadow shadow-white">
        <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">SẢN PHẨM BÁN CHẠY</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="flex flex-wrap">
            <div class="banner-poduct w-full md:w-1/3">
                <div class="banner pt-5 p-3">
                    <img src="https://nguyencongpc.vn/media/banner/14_Jun052d89a09e37a950cb80b6ef2e6a4ea4.webp"
                        alt="" class="rounded-lg">
                </div>
            </div>
            <div class="autoplay-sliderr p-3 w-full md:w-2/3">
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic"><i
                                        class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Siêu SALE</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 text-base">{{ $product['title'] }}</a>
                                    <div class="mt-3 inline-flex">
                                        <div>
                                            <p class="product-price line-through text-slate-500">
                                                {{ $product['old_price'] }}</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            {{ $product['discount'] }}
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-2xl mt-2">{{ $product['new_price'] }}</div>
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
        <div class="text grid-cols-1 md:grid-cols-1 grid justify-between items-center pt-2 px-6">
            <div class="text-animation text-xl md:text-2xl font-black">DANH MỤC NỖI BẬT</div>
        </div>
        <div class="autoplay-sliderr Categorys px-8 pt-5 bg-orange-400 h-28">
            @foreach ($categories as $Categorys)
                <li>{{ $Categorys->name }}</li>
            @endforeach
        </div>
</section>
{{-- PC GAMEMING --}}
<section class="produtc px-8 pt-6">
    <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
        <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">PC GAMING</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic"><i
                                        class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Siêu SALE</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 text-base">{{ $product['title'] }}</a>
                                    <div class="mt-3 inline-flex">
                                        <div>
                                            <p class="product-price line-through text-slate-500">
                                                {{ $product['old_price'] }}</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            {{ $product['discount'] }}
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-2xl mt-2">{{ $product['new_price'] }}
                                    </div>

                                    <div class="flex items-center pt-2">
                                        {{ $product['vocher'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>
{{-- MÀN HÌNH GAMEMING --}}
<section class="produtc px-8 pt-6">
    <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
        <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">MÀN HÌNH MÁY TÍNH </div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic"><i
                                        class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Siêu SALE</div>
                                <div class="product-info p-3">
                                    <a href=""
                                        class="hover:text-blue-600 text-base">{{ $product['title'] }}</a>
                                    <div class="mt-3 inline-flex">
                                        <div>
                                            <p class="product-price line-through text-slate-500">
                                                {{ $product['old_price'] }}</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            {{ $product['discount'] }}
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-2xl mt-2">{{ $product['new_price'] }}
                                    </div>

                                    <div class="flex items-center pt-2">
                                        {{ $product['vocher'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>
<section class="produtc px-8 pt-6">
    <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
        <div class="text grid-cols-1 md:grid-cols-2 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">LINH KIỆN MÁY TÍNH</div>
            <div class="text-see-more text-sm font-bold text-end">Xem thêm khuyến mãi</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic"><i
                                        class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Siêu SALE</div>
                                <div class="product-info p-3">
                                    <a href=""
                                        class="hover:text-blue-600 text-base">{{ $product['title'] }}</a>
                                    <div class="mt-3 inline-flex">
                                        <div>
                                            <p class="product-price line-through text-slate-500">
                                                {{ $product['old_price'] }}</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            {{ $product['discount'] }}
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-2xl mt-2">{{ $product['new_price'] }}
                                    </div>

                                    <div class="flex items-center pt-2">
                                        {{ $product['vocher'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>

<section class="produtc px-8 pt-6">
    <div class="bg-slate-100 rounded-lg shadow-2xl shadow-white">
        <div class="text grid-cols-1 md:grid-cols-1 grid justify-between items-center pt-2 px-6">
            <div class="text-sale text-xl md:text-2xl font-black text-red-500">TIN TỨC CÔNG NGHỆ</div>
        </div>
        <div class="product-slide">
            <div class="autoplay-slider p-3">
                
                    @foreach ($products as $product)
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2">
                                <div class="product-img w-48 mx-auto">
                                    <a href=""><img src="{{ $product['img'] }}" alt=""></a>
                                </div>
                                <div class="product-info p-2">
                                    <div class="text-red-700 font-bold text-2xl mt-2">
                                    </div>

                                    <div class="flex items-center pt-2">
                                        {{ $product['title'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    Tôi rất hài lòng với sản phẩm máy xay sinh tố XYZ và dịch vụ của cửa hàng. Đây là một lựa chọn tốt
                    cho những ai đang tìm kiếm một máy xay chất lượng với giá cả phải chăng. Tôi chắc chắn sẽ giới thiệu
                    sản phẩm này cho bạn bè và người thân.
                </div>
            </div>
            <div class="text-sale text-2xl md:text-2xl text-black max-w-4xl">
                <div class="text-evaluate">ĐÁNH GIÁ TỪ KHÁCH HÀNG</div>
                <div class="text-description  text-xl">
                    <p> Nguyễn Văn linh</p>
                    <img src="https://nguyencongpc.vn/media/news/0709_tienlinh.jpg" alt=""
                        class="w-36 mx-auto	px-8 rounded-r-3xl	">
                    Tôi rất hài lòng với sản phẩm máy xay sinh tố XYZ và dịch vụ của cửa hàng. Đây là một lựa chọn tốt
                    cho những ai đang tìm kiếm một máy xay chất lượng với giá cả phải chăng. Tôi chắc chắn sẽ giới thiệu
                    sản phẩm này cho bạn bè và người thân.
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="chinh-sach">
        <div class="rounded-lg shadow-2xl shadow-white px-8 pt-6">
            <div class="text grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 grid gap-4 justify-between items-center pt-2 px-6 m-auto">
                <div class="text-see-more text-sm font-bold text-center h-24 bg-slate-300 rounded-lg flex justify-center items-center	">
                    <div class="text-4xl"><i class="fa-solid fa-house" style="color: #438ef6;"></i></div>
                    <div class="px-1">
                        <p>CHÍNH SÁCH GIAO HÀNG</p>
                        <p>Nhận Hàng Và Thanh Toán Tại Nhà
                        </p>
                    </div>
                </div>
                <div class="text-see-more text-sm font-bold text-center h-24 bg-slate-300 rounded-lg flex justify-center items-center	">
                    <div class="text-4xl"><i class="fa-solid fa-house" style="color: #438ef6;"></i></div>
                    <div class="px-1">
                        <p>CHÍNH SÁCH GIAO HÀNG</p>
                        <p>Nhận Hàng Và Thanh Toán Tại Nhà
                        </p>
                    </div>
                </div>
                <div class="text-see-more text-sm font-bold text-center h-24 bg-slate-300 rounded-lg flex justify-center items-center	">
                    <div class="text-4xl"><i class="fa-solid fa-house" style="color: #438ef6;"></i></div>
                    <div class="px-1">
                        <p>CHÍNH SÁCH GIAO HÀNG</p>
                        <p>Nhận Hàng Và Thanh Toán Tại Nhà
                        </p>
                    </div>
                </div>
                <div class="text-see-more text-sm font-bold text-center h-24 bg-slate-300 rounded-lg flex justify-center items-center	">
                    <div class="text-4xl"><i class="fa-solid fa-house" style="color: #438ef6;"></i></div>
                    <div class="px-1">
                        <p>CHÍNH SÁCH GIAO HÀNG</p>
                        <p>Nhận Hàng Và Thanh Toán Tại Nhà
                        </p>
                    </div>
                </div>
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
</style>
