@include('public.header.index')

<div class="product__container max-w-screen-2xl mx-auto px-4 md:px-6 text-xs sm:text-base lg:px-8 xl:px-12">
    <nav class="bg-white mt-3 rounded-md w-full hidden md:block">
        <ol class="list-reset flex">
            <li><a href="#" class="text-black hover:text-blue-800">Trang chủ</a></li>
            <li><span class="mx-2 text-black"> > </span></li>
            <li class="text-black hover:text-blue-800">Tất cả sản phẩm </li>
        </ol>
    </nav>
    <div class="mt-3 slider autoplay w-full max-w-max">
        <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
        <div><a href="" class=""> <img class="rounded-lg" src="https://nguyencongpc.vn/media/banner/08_Sepba378ee53ba48fd87016f13cb7cb5a74.jpg" alt=""> </a></div>
    </div>
    <section class="product pt-6">
        <div class="rounded-lg shadow shadow-white">
            <div class="text grid grid-cols-1 justify-between items-center py-3">
                <div class="text-animation text-xl md:text-2xl font-black">Danh mục sản phẩm </div>
            </div>
            <div class="Categorys px-8 pt-5 bg-yellow-50">
                <div class="autoplay-slider flex flex-wrap justify-center">
                    @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="flex flex-col items-center justify-center text-center m-2 md:m-4">
                        <div class="flex flex-col items-center">
                            <span class="truncate">{{ $category->category_name }}</span>
                            <div class="w-10 h-10 mt-2 mb-2 flex items-center justify-center">
                                <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="object-contain w-full h-full">
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="flex">
        <div class="bg-white rounded-lg mr-2 relative border shadow-md w-1/4 p-3 mt-3">
            <form action="{{ route('productShow') }}" method="GET" id="filterForm">
                <h5 class="font-semibold uppercase">Thương hiệu</h5>
                <div class="border-b-2 py-3">
                    @foreach($brands as $brand)
                    <div class="form-check">
                        <input class="form-check-input brand-checkbox rounded mx-2" type="checkbox" name="brands[]" value="{{ $brand->id }}" id="brand{{ $brand->id }}" {{ in_array($brand->id, request()->brands ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="brand{{ $brand->id }}">
                            {{ $brand->brand_name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <h5>Price</h5>
                <div class="range-slider" id="price-slider"></div>
                <input class="range-slider__range" type="hidden" id="min-price" name="min_price" value="{{ request()->min_price ?? $minPrice }}">
                <input class="range-slider__range" type="hidden" id="max-price" name="max_price" value="{{ request()->max_price ?? $maxPrice }}">
                <div class="mt-2">
                    <span id="price-range"></span>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
    $(document).ready(function() {
        var minPrice = {{ $minPrice }};
        var maxPrice = {{ $maxPrice }};
        var selectedMinPrice = {{ request()->min_price ?? $minPrice }};
        var selectedMaxPrice = {{ request()->max_price ?? $maxPrice }};

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
