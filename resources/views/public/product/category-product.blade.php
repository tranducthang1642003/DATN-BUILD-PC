
@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > </span></li>
            <li><a href="#" class="text-black hover:text-blue-800">{{ $category->category_name }}</a></li>
        </ol>
    </nav>
    <div class="product__banner">
        <div class="mt-3 slider one-time w-full max-w-max">
            @foreach($banners_top as $banner)
                <img src="{{ asset($banner->images_url) }}" alt="{{ $banner->alt_text }}" class="-64 w-full object-cover">
        @endforeach
        </div>
        <h1 class="text-base md:text-xl lg:text-2xl xl:text-3xl text-center pt-3 text-sky-600 font-bold pb-3 uppercase">{{ $category->category_name }}</h1>
        <div class="box-top-product bg-red-700 rounded-lg">
            <p class="text-base md:text-xl lg:text-2xl xl:text-3xl font-bold text-center pt-3 text-white">TOP 10 SẢN PHẨM NỔI BẬT</p>
            <section>
                <div class="product-slide ">
                    <div class="autoplay-sanpham p-3">
                        @foreach ($topProducts as $top)
                        <div class="product__item h-96">
                            <div class="bg-white  mr-2 relative" style="border-radius: 10px;">
                            @if($top->created_at->diffInDays(now()) <= 30)
                        <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                    @endif
                                <div class="product-img">
                                    <a href="{{ route('product.show', $top->slug) }}"><img class="w-32 mx-auto md:w-48" src="{{ $top->primary_image_path }}"></a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-20 md:w-24 text-center ml-3 italic p-1">
                                    <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Bán chạy
                                </div>
                                <div class="product-info p-3">
                                    <a href="{{ route('product.show', $top->slug) }}" class="hover:text-blue-600 truncate-2-lines" style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        line-height: 25px;
                                        -webkit-line-clamp: 2;
                                        height: 50px;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;">{{ $top->product_name }}</a>
                                    <p class="text-gray-400 truncate-2-lines">{{ $top->short_description }}</p>
                                    <div class="flex items-center mt-2">
                                        <div class="text-sm text-slate-500 line-through" >
                                            {{ number_format($top->price) }}
                                            VND
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3 text-sm">
                                            {{ $top->discount_percentage }}%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-lg mt-2 my-2">
                                        {{ number_format($top->price_sale) }} VND
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="product__box-filter border mt-3 rounded-lg ">
        <div class="info-filter-product p-2">
            <p class="title font-medium">Khoảng giá:</p>
            <div class="list-filter-product flex flex-wrap lg:flex-row">
                @php
                $price = [
                ['range' => '1 triệu - 2 triệu', 'min' => 0, 'max' => 2000000],
                ['range' => '2 triệu - 5 triệu', 'min' => 2000000, 'max' => 5000000],
                ['range' => '5 triệu - 7 triệu', 'min' => 5000000, 'max' => 7000000],
                ['range' => '7 triệu - 10 triệu', 'min' => 7000000, 'max' => 10000000],
                ['range' => '10 triệu - 15 triệu', 'min' => 10000000, 'max' => 15000000],
                ['range' => '15 triệu - 20 triệu', 'min' => 15000000, 'max' => 20000000],
                ['range' => '20 triệu - 50 triệu', 'min' => 20000000, 'max' => 50000000],
                ];
                @endphp

                @foreach ($price as $range)
                @php
                $isActive = ($request->filled('min_price') && $request->filled('max_price') &&
                $request->min_price == $range['min'] && $request->max_price == $range['max']);
                $filterProducts = $products->where('price', '>=', $range['min'])->where('price', '<=', $range['max']); $countFilterProducts=$filterProducts->count();
                @endphp
                @if ($countFilterProducts > 0)
                @if ($isActive)
                <span class="item-active border bg-blue-500 text-white mt-2 p-1 pr-2 pl-2 rounded-lg mr-3">
                    <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $range['range'] }}(Xóa)</a>
                </span>
                @else
                <a href="{{ route('category.show', ['slug' => $category->slug, 'min_price' => $range['min'], 'max_price' => $range['max']]) }}" class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    {{ $range['range'] }}
                    ({{ $countFilterProducts }})
                </a>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        <div class="product__info-filter p-2">
            <p class="title font-medium">Chọn theo thương hiệu:</p>
            <div class="flex flex-wrap lg:flex-row list-filter-product">
                @foreach ($brands as $brand)
                @php
                $isActive = ($request->filled('brand') && $request->brand == $brand->id);
                $filterProducts = $products->where('brand_id', $brand->id);
                $countFilterProducts = $filterProducts->count();
                @endphp

                @if ($countFilterProducts > 0)
                @if ($isActive)
                <span class="item-active border bg-blue-500 text-white mt-2 p-1 pr-2 pl-2 rounded-lg mr-3">
                    <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $brand->brand_name }}(Xóa)</a>
                </span>
                @else
                <a href="{{ route('category.show', ['slug' => $category->slug, 'brand' => $brand->id]) }}" class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    {{ $brand->brand_name }}
                    ({{ $countFilterProducts }})
                </a>
                @endif
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="product__box-list border rounded-lg mt-3">
        <div class="box-sort-product pl-2">
            <div class="flex flex-wrap lg:flex-row md:flex-wrap">
                <a href="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'price_asc']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Giá tăng dần</span>
                </a>
                <a href="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'price_desc']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Giá giảm dần</span>
                </a>
                <a href="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'view']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Lượt xem</span>
                </a>
                <a href="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'alphabetical']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Từ A->Z</span>
                </a>
            </div>
        </div>
        <div class="product__list">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 m-2">
                @foreach ($products as $product)
                <div class="product__item mb-2">
                    <div class="bg-white rounded-lg mr-2 relative border shadow-lg h-full relative group">
                    @if($product->created_at->diffInDays(now()) <= 30)
                        <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                    @endif
                        <div class="product-img">
                            <a href=""><img class="w-32 mx-auto md:w-48" src="{{ $product->primary_image_path }}"></a>
                        </div>
                        <div class="bg-red-900 text-white rounded-full w-20 md:w-24 text-center ml-3 italic p-1">
                            <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Bán chạy
                        </div>
                        <div class="product-info p-3">
                            <a href="{{ route('product.show', $product->slug) }}" class="hover:text-blue-600 truncate-2-lines" style="overflow: hidden;
                                        -webkit-box-orient: vertical;">{{ $product->product_name }}</a>
                            <p class="text-gray-400 truncate-2-lines">{{ $product->short_description }}</p>
                            <div class="flex items-center mt-2">
                                        <div class="text-sm text-slate-500 line-through">
                                            {{ number_format($product->price) }}
                                            VND
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3 text-sm">
                                            {{ $product->discount_percentage }}%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-lg mt-2">
                                        {{ number_format($product->price_sale) }} VND
                                    </div>
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
                                                <div class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                    {{-- Like button --}}
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
                                                    {{-- Cart button --}}
                                                    <div class="cart">
                                                        <button class="add-to-cart-btn relative" data-product-id="{{ $product->id }}">
                                                            <div class="flex items-center justify-center h-10 w-10 bg-blue-500 rounded-full text-white">
                                                                <i class="fa-solid fa-shopping-cart"></i>
                                                                <!-- Lớp phủ tải -->
                                                                <div class="loading-overlay" style="display: none;"></div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
        </div>
    </div>
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