<div class="product__box-list border rounded-lg mt-3">
    <div class="box-sort-product pl-2">
        <div class="flex flex-wrap lg:flex-row md:flex-wrap">
            <a href="{{ route('productShow', ['sort' => 'price_asc']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                <span>Giá tăng dần</span>
            </a>
            <a href="{{ route('productShow', ['sort' => 'price_desc']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                <span>Giá giảm dần</span>
            </a>
            <a href="{{ route('productShow', ['sort' => 'view']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                <span>Lượt xem</span>
            </a>
            <a href="{{ route('productShow', ['sort' => 'alphabetical']) }}" class="border p-2 mt-2 rounded-lg mr-3 hover:text-blue-500 hover:border-blue-500">
                <span>Từ A->Z</span>
            </a>
        </div>
    </div>
    <div class="product__list">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 m-2">
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
                        <div class="product-info p-3">
                            <a href="{{ route('product.show', $product->slug) }}" class="truncate-2-lines hover:text-blue-600" style="overflow: hidden;
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
                        
                    </div>
                </div>
            @endforeach
            @if($products->isEmpty())
                <p>No products found.</p>
            @endif
        </div>
    </div>
</div>
