@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > </span></li>
            <li><a href="#" class="text-black hover:text-blue-800">Tìm kiếm: {{ request('query') }}</a></li>
        </ol>
    </nav>
    <div class="product__banner">
        <div class="mt-3 slider autoplay w-full max-w-max">
            <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
            <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
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
                        <a href="{{ route('product.search', ['query' => $query]) }}">{{ $range['range'] }}(Xóa)</a>
                    </span>
                    @else
                    <a href="{{ route('product.search', ['slug' => $query, 'min_price' => $range['min'], 'max_price' => $range['max']]) }}" class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
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
                    <a href="{{ route('product.search', ['slug' => $query]) }}">{{ $brand->brand_name }} (Xóa)</a>
                </span>
                @else
                <a href="{{ route('product.search', ['slug' => $query, 'brand' => $brand->id]) }}" class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    {{ $brand->brand_name }} ({{ $countFilterProducts }})
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
                <a href="{{ route('product.search') }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Giá tăng dần</span>
                </a>
                <a href="{{ route('product.search') }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Giá giảm dần</span>
                </a>
                <a href="{{ route('product.search') }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Lượt xem</span>
                </a>
                <a href="{{ route('product.search') }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                    <span>Từ A->Z</span>
                </a>
            </div>
        </div>
        <div class="product__list">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 m-2">
                @foreach ($products as $product)
                <div class="product__item mb-2">
                    <div class="bg-white rounded-lg mr-2 relative border shadow-lg h-full">
                        <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                        <div class="product-img">
                            <a href=""><img class="w-32 mx-auto md:w-48" src="{{ $product->primary_image_path }}"></a>
                        </div>
                        <div class="bg-red-900 text-white rounded-full w-20 md:w-24 text-center ml-3 italic p-1">
                            <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Bán chạy
                        </div>
                        <div class="product-info p-3">
                            <a href="{{ route('product.show', $product->slug) }}" class="hover:text-blue-600 truncate-responsive" style="overflow: hidden;
                                text-overflow: ellipsis;
                                line-height: 25px;
                                -webkit-line-clamp: 2;
                                height: 50px;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">{{ $product->product_name }}</a>
                            <p class="text-gray-400 truncate-2-lines">{{ $product->short_description }}</p>
                            <div class="mt-1 inline-flex text-xs md:text-base">
                                <div>
                                    <p class="product-price line-through text-slate-500">{{ $product->discount }}
                                    </p>
                                </div>
                                <div class="bg-red-700 text-red-700 font-bold text-white rounded-full ml-3 pl-3 pr-3">
                                    -25%
                                </div>
                            </div>
                            <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">{{ $product->price }}</div>
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
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center">
            <div class="pagination">
                {{-- {{ $product->links() }} --}}
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