@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> >BUILD PC </span></li>
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
    <section>
        <div class="">
            @foreach ($Productandcategory as $category)
                <button class="bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition flex"
                    onclick="openModal('modelConfirm{{ $category->id }}')">
                    {{ $category->category_name }}
                </button>
            @endforeach
        </div>
        @foreach ($Productandcategory as $category)
            <div id="modelConfirm{{ $category->id }}"
                class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white  w-3/4">
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
                        <div>
                            @if($category->products->isEmpty())
                                <p>Không có sản phẩm nào.</p>
                            @else
                              <div class=" grid grid-cols-5 pt-4 ">
                                @foreach ($category->products as $product)
                                <div class="border p-4 w-56 pt-6 py-9 ">
                                    <img src="{{ $product->primary_image_path }}" alt="{{ $product->product_name }}" class="w-60 h-48 object-cover mb-2">
                                    <h3 class="text-lg font-medium">{{ $product->product_name }}</h3>
                                    <p class="text-gray-600">{{ $product->price }} VND</p>
                               <button>thêm vào linh kiện</button>
                                </div>
                            @endforeach
                              </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section>
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
    </section>
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
