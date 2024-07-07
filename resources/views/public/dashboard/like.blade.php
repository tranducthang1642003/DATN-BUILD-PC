@include('public.dashboard.layout.header')
<div class="bg-white p-4 col-span-7 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold mb-4 bg-blue-200 flex justify-center items-center p-3 rounded-lg shadow-lg">Trang Sản Phẩm Yêu Thích</h1> 
    <div class="w-full table-responsive mb-5">

        <table
            class="w-full bg-white border border-gray-200 divide-y divide-gray-200 text-center hover:border-spacing-2 table-fixed ">
            <thead class="bg-yellow-400 text-black">
                <tr>
                    <th class="py-2">Hình</th>
                    <th class="py-2">Tên sản phẩm</th>
                    <th class="py-2">Giá</th>
                    <th class="py-2">bỏ thích</th>
                </tr>
            </thead>

            <tbody class="align-middle">
                @foreach ($likeItem as $item)
                <tr class="border">
                    <td class="py-2 flex items-center justify-center"><img src="{{ $item->product->image_url }}"
                            alt="" class="w-20 h-20 p-2 tex"></td>
                    <td>
                        <span>
                            <p>{{ $item->product->product_name }}</p>
                        </span>
                    </td>
                    <td class="py-2">{{ $item->product->price }}VND</td>
                    <td class="py-2">
                        <form action="{{route('deletelike',$item)}}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button class="btn btn-danger border p-2 bg-blue-200 rounded-xl btn-sm" onclick="return confirm('mày có chắc muốn xóa ko')" ><i class="fa fa-heart" style="color:#ff0000" ></i></button>
                        </form> 
                    </td>
                </tr>
                @endforeach
                    
            </tbody>
        </table>
    </div>
</div>
@include('public.dashboard.layout.footer')