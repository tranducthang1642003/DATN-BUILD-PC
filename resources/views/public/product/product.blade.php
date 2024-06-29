@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > </span></li>
            <li><a href="#" class="text-black hover:text-blue-800">MÀN HÌNH MÁY TÍNH</a></li>
        </ol>
    </nav>
    <div class="product__banner">
        <div class="mt-3 slider autoplay w-full max-w-max">
            <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
            <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
        </div>
        <h1 class="text-base md:text-xl lg:text-2xl xl:text-3xl text-center pt-3 text-sky-600 font-bold pb-3">MÀN HÌNH MÁY TÍNH</h1>
        <div class="box-top-product bg-red-700 rounded-lg">
            <p class="text-base md:text-xl lg:text-2xl xl:text-3xl font-bold text-center pt-3 text-white">TOP 10 SẢN PHẨM NỔI BẬT</p>
            <div class="product-slide ">
                <div class="autoplay-slider p-3">
                    @foreach ($topFeaturedProducts as $topProduct)
                    <div class="product__item ">
                        <div class="bg-white rounded-lg mr-2">
                            <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                            <div class="product-img pt-3">
                                @foreach ($product_images as $image)
                                @if ($image->product_id == $topProduct->id)
                                <a href=""> <img class="w-32 mx-auto md:w-48" src="{{ $image -> image_path }}" alt=""> </a>
                                @break
                                @endif
                                @endforeach
                            </div>
                            <div class="bg-red-900 text-white rounded-full w-20 md:w-24 text-center ml-3 italic p-1"><i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Bán chạy</div>
                            <div class="product-info p-3">
                                <a href="{{ route('detailproduct.show', $topProduct->id) }}" class="hover:text-blue-600 truncate-responsive"> {{ $topProduct -> product_name }} </a>
                                <p class="text-gray-400 truncate-2-lines">{{ $topProduct -> short_description }}</p>
                                <div class="mt-1 inline-flex text-xs md:text-base">
                                    <div class="">
                                        <p class="product-price line-through text-slate-500">{{ $topProduct -> price }}</p>
                                    </div>
                                    <div class="bg-red-700 text-red-700 font-bold text-white rounded-full ml-3 pl-3 pr-3">
                                        -25%
                                    </div>
                                </div>
                                <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">{{ $topProduct -> price }}</div>
                                <div class="flex items-center">
                                    <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                    <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                    <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                    <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                    <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                    <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-2 text-gray-400">
                                        (12 Đánh giá)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product__box-filter border mt-3 rounded-lg ">
            <div class="info-filter-product p-2">
                <p class="title font-medium">Khoảng giá:</p>
                <div class="list-filter-product flex flex-wrap lg:flex-row ">
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">1 triệu - 2 triệu</a>
                        <a href="">(12)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">2 triệu - 5 triệu</a>
                        <a href="">(122)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">5 triệu - 7 triệu</a>
                        <a href="">(48)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">7 triệu - 10 triệu</a>
                        <a href="">(37)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">10 triệu - 15 triệu</a>
                        <a href="">(26)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">15 triệu - 20 triệu</a>
                        <a href="">(9)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">20 triệu - 50 triệu</a>
                        <a href="">(21)</a>
                    </div>
                </div>
            </div>
            <div class="product__info-filter p-2">
                <p class="title font-medium">Chọn theo thương hiệu:</p>
                <div class="flex flex-wrap lg:flex-row list-filter-product">
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500 ">
                        <a href="">ASUS</a>
                        <a href="">(12)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(122)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(48)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(37)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(26)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(9)</a>
                    </div>
                    <div class="item border bg-slate-100 mt-2 p-1 pr-2 pl-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <a href="">ASUS</a>
                        <a href="">(21)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__box-list border rounded-lg mt-3">
            <div class="box-sort-product pl-3">
                <div class="flex flex-wrap lg:flex-row md:flex-wrap">
                    <a href="" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <span>Giá tăng dần</span>
                    </a>
                    <a href="" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <span>Giá giảm dần</span>
                    </a>
                    <a href="" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <span>Trao đổi</span>
                    </a>
                    <a href="" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <span>Đánh giá</span>
                    </a>
                    <a href="" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                        <span>Từ A->Z</span>
                    </a>
                </div>
            </div>
            <div class="product__list">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 m-2">
                    @foreach ($product as $item)
                    <div class="product__item bg-white rounded-lg shadow-lg border hover:scale-105 transition-transform duration-300 m-1">
                        <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                        <div class="product-img mt-3">
                            @foreach ($product_images as $image)
                            @if ($image->product_id == $item->id)
                            <a href=""> <img class="w-32 mx-auto md:w-48" src="{{ $image -> image_path }}" alt=""> </a>
                            @break
                            @endif
                            @endforeach
                        </div>
                        <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "><i class="fa-solid fa-bolt" style="color: #FFD43B;"></i> Bán chạy</div>
                        <div class="product-info p-3">
                            <a href="{{ route('detailproduct.show', $item->id) }}" class="hover:text-blue-600"> {{ $item -> product_name }} </a>
                            <p class="text-gray-400"> {{ $item -> short_description }} </p>
                            <div class="mt-3 inline-flex text-xs md:text-base">
                                <div class="">
                                    <p class="product-price line-through text-slate-500"> {{ $item -> price }} </p>
                                </div>
                                <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                    -25%
                                </div>
                            </div>
                            <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1"> {{ $item -> price }} </div>
                            <div class="flex items-center">
                                <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-2 text-gray-400">
                                    (12 Đánh giá)
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center">
                <div class="pagination">
                    {{ $product->links() }}
                </div>
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