@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > </span></li>
            <li class="text-black hover:text-blue-800">Tất cả sản phẩm </li>
        </ol>
    </nav>
    <div class="one-time mt-3 w-full max-w-max ">
    @foreach($banners_top as $banner)
                <img src="{{ $banner->images_url }}" alt="{{ $banner->alt_text }}" class="h-64">
        @endforeach
    </div>
    <section class="product pt-6">
        <div class="rounded-lg shadow shadow-white">
            <div class="text grid grid-cols-1 justify-between items-center py-3">
                <div class="text-animation text-xl md:text-2xl font-black">Danh mục sản phẩm </div>
            </div>
            <div class="category px-5 py-3 bg-yellow-50">
                <div class="justify-center autoplay-slider">
                    @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="flex flex-col items-center justify-center text-center m-2 md:m-4 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
                        <div class="flex flex-col items-center hover:">
                            <div class="w-10 h-10 mt-2 mb-2 flex items-center justify-center">
                                <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="object-contain w-full h-full">
                            </div>
                            <span class="truncate">{{ $category->category_name }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="flex">
        <div class="bg-white mr-2 relative w-1/4">
            <form action="{{ route('productShow') }}" method="GET" id="filterForm">
                <div class="border rounded-lg shadow-md p-3 my-3">
                    <h5 class="font-semibold uppercase">Thương hiệu</h5>
                    @foreach($brands as $brand)
                    <div class="form-check">
                        <input class="form-check-input brand-checkbox rounded mx-2" type="checkbox" name="brands[]" value="{{ $brand->id }}" id="brand{{ $brand->id }}" {{ in_array($brand->id, request()->brands ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="brand{{ $brand->id }}">
                            {{ $brand->brand_name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="border rounded-lg py-3 shadow-md p-3">
                    <h5 class="font-semibold uppercase"> Giá </h5>
                <div class="range-slider" id="price-slider"></div>
                <input class="range-slider__range" type="hidden" id="min-price" name="min_price" value="{{ request()->min_price ?? $minPrice }}">
                <input class="range-slider__range" type="hidden" id="max-price" name="max_price" value="{{ request()->max_price ?? $maxPrice }}">
                <div class="mt-2">
                    <span id="price-range"></span>
                </div>
                </div>
            </form>
        </div>
        <div class="w-3/4">
            <div id="product-list">
                @include('public.product.product-list', ['products' => $products])
            </div>
        </div>
    </div>
    <!-- Hiển thị liên kết phân trang -->
    <div class="pagination">
        {{ $products->links() }}
    </div>
    <section>

        <div class="container mx-auto py-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">TIN TỨC NỔI BẬT</h2>
                <a href="#" class="text-blue-500">XEM THÊM</a>
            </div>
            <div class="autoplay-sanpham">
                @foreach($featuredBlogs as $blog)
                    <div class="px-3">
                <div class="bg-white px-4 my-3 border rounded-lg shadow-md">
                    <img src="{{ $blog -> blog_image }}" alt="Promotion 1" class="my-3 rounded" style="width:100%; height: 170px">
                    <h3 class="text-lg font-bold truncate-2-lines">{{ $blog -> title }}</h3>
                    <p class="mt-2 text-green-500 truncate-2-lines"></p>
                </div>
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        let minPrice = {{$minPrice}};
        let maxPrice = {{$maxPrice}};
        let selectedMinPrice = {{request() -> min_price ?? $minPrice}};
        let selectedMaxPrice = {{request() -> max_price ?? $maxPrice}};

        $("#price-slider").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [selectedMinPrice, selectedMaxPrice],
            slide: function(event, ui) {
                $("#min-price").val(ui.values[0]);
                $("#max-price").val(ui.values[1]);
                $("#price-range").text("$" + ui.values[0] + " - $" + ui.values[1]);
                fetchProducts();
            }
        });

        $("#price-range").text("$" + selectedMinPrice + " - $" + selectedMaxPrice);

        $(".brand-checkbox").change(function() {
            fetchProducts();
        });

        function fetchProducts() {
            $.ajax({
                url: "{{ route('productShow') }}",
                method: "GET",
                data: $("#filterForm").serialize(),
                success: function(response) {
                    if (response.products) {
                        $("#product-list").html(response.products);
                    } else {
                        console.error('No products found in response.');
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                }
            });
        }
    });
</script>
