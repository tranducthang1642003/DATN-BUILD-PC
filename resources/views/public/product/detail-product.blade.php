@include('public.header.index')
<div class="product-detail__page max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <div class="detail-product__container">
        <div class="">
            <nav class="bg-white p-4 rounded-md w-full hidden lg:block">
                <ol class="list-reset flex">
                    <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
                    <li><span class="mx-2 text-black"> > </span></li>
                    <li><a href="" class="text-black hover:text-blue-800">MÀN HÌNH MÁY TÍNH</a></li>
                    <li><span class="mx-2 text-black"> > </span></li>
                    <li><a href="#" class="text-black hover:text-blue-800"></a>CHỌN THEO HÃNG</li>
                    <li><span class="mx-2 text-gray-500"> > </span></li>
                    <li class="text-gray-500">Màn hình Asus</li>
                </ol>
            </nav>
        </div>
        <div class="product-detail__box-content flex flex-col lg:flex-row">
            <div class="box-left grow mt-3">
                <div class="product-detail__images">
                    <div class="swiper gallery-top">
                        <div class="md:max-w-xl max-w-sm mx-auto slider-for">
                            <div class="">
                                <img src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt="">
                            </div>
                            <div class="">
                                <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577024.png" alt="">
                            </div>
                            <div class="">
                                <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577032.png" alt="">
                            </div>
                            <div class="">
                                <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577045.png" alt="">
                            </div>
                            <div class="">
                                <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577053.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper gallery-thumbs mt-3 hidden lg:block">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide thumb-img max-w-lg mx-auto slider-nav">
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt="">
                                </div>
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577024.png" alt="">
                                </div>
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577032.png" alt="">
                                </div>
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577045.png" alt="">
                                </div>
                                <div class="rounded-lg w-48 h-auto mr-3">
                                    <img src="https://nguyencongpc.vn/media/product/250-25387-screenshot_1689577053.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-product-summary p-5 mt-3 lg:mt-5 border rounded-xl hidden lg:block">
                    <p class="title font-semibold text-lg">Thông số sản phẩm</p>
                    <ul class="list-product-summary list-disc pl-5 mt-2">
                        <li>Tấm nền: IPS</li>
                        <li>Màu hiển thị : 16,7M</li>
                        <li>Độ phân giải : 1920x1080</li>
                        <li>Model: TUF Gaming VG249Q3A</li>
                        <li>Âm thanh: Loa (2Wx2)</li>
                    </ul>
                </div>
            </div>
            <div class="box-right grow ml-0 md:ml-10 mt-5">
                <h1 class="detail-product_name text-base md:text-lg xl:text-xl">
                    Màn Hình TUF Gaming VG249Q3A (24 Inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG)
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
                <div class="box-price-detail flex mt-3 border-2 rounded-2xl p-1 md:p-3">
                    <p class="price-detail text-lg lg:text-xl xl:text-4xl font-semibold text-red-700 ml-3 mr-5">3.190.000đ</p>
                    <span class="market-price-detail text-base md:text-lg lg:text-xl line-through text-slate-400 place-self-center mr-5">4.000.000₫</span>
                    <div class="save-price-detail text-base md:text-lg lg:text-xl text-red-700 place-self-center hidden lg:block">Tiết kiệm 810.000đ</div>
                    <div class="bg-red-700 text-red-700 font-bold text-white rounded-full ml-3 pl-3 pr-3 place-self-center block lg:hidden">-25%</div>
                </div>
                <div class="detail__buy-quantity flex mt-2 md:mt-5 justify-start">
                    <div class="flex items-center space-x-4 mr-5 md:mr-10">
                        <button id="decrement" class="bg-slate-200 text-black px-4 py-2 rounded-full hover:bg-amber-400">-</button>
                        <span id="quantity" class="text-base md:text-lg lg:text-xl font-medium">1</span>
                        <button id="increment" class="bg-slate-200 text-black px-4 py-2 rounded-full hover:bg-amber-400">+</button>
                    </div>
                    <a class="border p-3 rounded-xl pr-5 pl-5 border-amber-400 text-amber-400 hover:bg-amber-400 hover:text-white" href="">
                        <i class="fa-solid fa-cart-shopping hover:text-white"></i>
                        THÊM VÀO GIỎ HÀNG
                    </a>
                </div>
                <div class="fixed bottom-0 left-0 right-0 bg-white p-3 md:hidden z-10 shadow-xl border w-full">
                    <div class="detail__buy-quantity flex mt-2 md:mt-5 justify-start">
                        <div class="flex items-center space-x-4 mr-3 md:mr-10">
                            <button id="decrement" class="bg-slate-200 text-black px-2 py-1 rounded-full hover:bg-amber-400">-</button>
                            <span id="quantity" class="text-xs md:text-lg lg:text-xl font-medium">1</span>
                            <button id="increment" class="bg-slate-200 text-black px-2 py-1 rounded-full hover:bg-amber-400">+</button>
                        </div>
                        <a class="border p-2 text-xs md:text-base rounded-xl mr-2 pr-3 pl-3 border-amber-400 text-amber-400" href="">
                            THÊM VÀO GIỎ HÀNG
                        </a>
                        <div class="detail-buy-now border p-2 text-xs md:text-base md:p-3 rounded-xl pr-5 pl-5 bg-red-600 text-white text-center">
                            <a href="" class="w-full">
                                <p class="text-xs">MUA NGAY</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="detail-buy mt-2 md:mt-5">
                    <div class="detail-buy-now border p-2 md:p-3 rounded-xl pr-5 pl-5 bg-red-600 text-white hover:bg-red-500 hover:text-white text-center">
                        <a href="" class="w-full">
                            <p class="text-base md:text-lg lg:text-xl font-semibold">ĐẶT MUA NGAY</p>
                            <span>Giao hàng tận nơi nhanh chóng</span>
                        </a>
                    </div>
                    <div class="detail-add-cart grid grid-cols-2 divide-x mt-2 md:mt-5">
                        <a href="" class="mr-1 md:mr-2 border p-2 md:p-3 rounded-xl pr-2 pl-2 md:pr-5 md:pl-5 bg-blue-600 text-white hover:bg-blue-500 hover:text-white text-center">
                            <p>TRẢ GÓP QUA HỒ SƠ</p> <span>Chỉ từ 2.665.000₫/ tháng</span>
                        </a>
                        <a href="" class="ml-1 md:ml-2 border p-2 md:p-3 rounded-xl pr-2 pl-2 md:pr-5 md:pl-5 bg-blue-600 text-white hover:bg-blue-500 hover:text-white text-center">
                            <p>TRẢ GÓP QUA THẺ</p> <span>Chỉ từ 1.332.500₫/ tháng</span>
                        </a>
                    </div>
                </div>
                <div class="box-product-policy-detal mt-3 md:mt-5">
                    <h1 class="font-semibold">YÊN TÂM MUA HÀNG</h1>
                    <div class="list-showroom-detail mt-2 grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="item">

                            <p> <i class="fa-regular fa-handshake" style="color: #d60000;"></i> Cam kết giá tốt nhất thị trường.</p>
                        </div>
                        <div class="item">
                            <p><i class="fa-solid fa-award" style="color: #d60000;"></i> Sản phẩm mới 100%.</p>
                        </div>
                        <div class="item">

                            <p><i class="fa-solid fa-repeat" style="color: #d60000;"></i> Lỗi 1 đổi 1 ngay lập tức.</p>
                        </div>
                        <div class="item">
                            <p><i class="fa-solid fa-file-invoice-dollar" style="color: #d60000;"></i> Hỗ trợ trả góp - Thủ tục nhanh gọn.</p>
                        </div>
                    </div>
                </div>
                <div class="box-product-summary p-3 md:p-5 mt-3 md:mt-5 border rounded-xl lg:hidden block">
                    <p class="title font-semibold text-lg">Thông số sản phẩm</p>
                    <ul class="list-product-summary list-disc pl-5 mt-2">
                        <li>Tấm nền: IPS</li>
                        <li>Màu hiển thị : 16,7M</li>
                        <li>Độ phân giải : 1920x1080</li>
                        <li>Model: TUF Gaming VG249Q3A</li>
                        <li>Âm thanh: Loa (2Wx2)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-read-product-detail mt-3 md:mt-5 grid gap-1 grid-cols-1 md:grid-cols-2">
            <div class="box-left">
                <div class="mx-auto rounded-xl border p-3 md:p-5">
                    <h1 class="text-xl font-bold mb-4">Đánh giá sản phẩm</h1>
                    <form class="bg-white">
                        <div class="mb-2">
                            <label for="name" class="block text-gray-700 font-bold mb-1">Tên bạn</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block text-gray-700 font-bold mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="">
                        </div>
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
                </div>
            </div>
            <div class="box-right">
                <div class="box-comment mx-auto rounded-xl border p-3 md:p-5">
                    <h1 class="text-xl font-bold mb-4">Hỏi và đáp</h1>
                    <div class="comment-detail">
                        <div class="form-comment">
                            <textarea id="comment" name="comment" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-amber-400 resize-none" placeholder="Xin mời để lại câu hỏi"></textarea>
                            <form class="items-center space-x-6">
                                <label class="">
                                    <span class="block text-sm font-medium text-gray-700 mb-2">Đính kèm ảnh</span>
                                    <input type="file" class="block w-full text-sm text-slate-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-violet-100
                                    " />
                                </label>
                            </form>
                            <button type="submit" class="w-full bg-amber-400 text-white font-bold mt-3 py-2 px-4 rounded-lg hover:bg-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-400 focus:ring-opacity-50">
                                Gửi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="product__box-relative mt-5">
            <div class="product__box-category">
                <div class="title">
                    <h2 class="title title-box text-base md:text-lg lg:text-xl xl:text-2xl font-semibold mb-2"> SẢN PHẨM TƯƠNG TỰ </h2>
                </div>
                <div class="product-slide box-list-relative-product mt-3">
                    <div class="autoplay-slider">
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product__box-history mt-5">
            <div class="product__box-history">
                <div class="title">
                    <h2 class="title title-box text-base md:text-lg lg:text-xl xl:text-2xl font-semibold mb-2"> SẢN PHẨM ĐÃ XEM </h2>
                </div>
                <div class="product-slide box-list-history-product mt-3">
                    <div class="autoplay-slider">
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3 ">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img ">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="bg-white rounded-lg mr-2 border">
                                <span class="bg-red-400 text-white rounded-full ml-3 p-3 absolute mt-2">Hot</span>
                                <div class="product-img">
                                    <a href=""> <img class="w-32 mx-auto md:w-48" src="https://nguyencongpc.vn/media/product/250-25387-m--n-h--nh-asus-tuf-gaming-vg279q3a.jpg" alt=""> </a>
                                </div>
                                <div class="bg-red-900 text-white rounded-full w-24 text-center ml-3 italic "> <i class="fa-solid fa-bolt" style="color: #FFD43B;"></i>Bán chạy</div>
                                <div class="product-info p-3">
                                    <a href="" class="hover:text-blue-600 truncate-2-lines"> Màn hình ASUS TUF Gaming VG279Q3A (27 inch/ Full HD/ 180Hz/ FreeSync/ 1ms GTG) </a>
                                    <p class="text-gray-400">Màn hình máy tính</p>
                                    <div class="mt-3 inline-flex ">
                                        <div class="">
                                            <p class="product-price line-through text-slate-500">7.500.000</p>
                                        </div>
                                        <div class="bg-red-700 text-white rounded-full ml-3 pl-3 pr-3">
                                            -25%
                                        </div>
                                    </div>
                                    <div class="text-red-700 font-bold text-base md:text-lg xl:text-xl lg:text-2xl mt-1">6.000.000đ</div>
                                    <div class="flex items-center">
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-amber-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-sm md:text-base xl:text-lg lg:text-xl text-gray-400">&#9733;</span>
                                        <span class="text-xs md:text-sm xl:text-base lg:text-lg ml-3 text-gray-400">
                                            (12 Đánh giá)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-3 mb-5 text-xs sm:text-base">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 justify-between">
            <div class="item border rounded-lg mr-2 mt-2">
                <p class="text-center p-5">
                    <i class="fa-solid fa-truck"></i>
                    <b>CHÍNH SÁCH GIAO HÀNG</b><br>
                    <span>Nhận Hàng Và Thanh Toán Tại Nhà</span>
                </p>
            </div>
            <div class="item border rounded-lg mr-2 mt-2">
                <p class="text-center p-5 ">
                    <i class="fa-solid fa-repeat"></i>
                    <b>ĐỔI TRẢ DỄ DÀNG</b><br>
                    <span>1 Đổi 1 Trong 15 Ngày</span>
                </p>
            </div>
            <div class="item border rounded-lg mr-2 mt-2">
                <p class="text-center p-5 ">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <b>THANH TOÁN TIỆN LỢI</b><br>
                    <span>Tiền Mặt, CK, Trả Góp 0%</span>
                </p>
            </div>
            <div class="item border rounded-lg mr-2 mt-2">
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