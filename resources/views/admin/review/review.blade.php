<style>
    .product_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
    .content {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 10px;
      z-index: 9999;
      display: none;
    }

    .close-button {
      position: absolute;
      top: 5px;
      right: 5px;
      cursor: pointer;
    }
  </style>
</style>
@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-xs sm:text-sm">
        <div class="flex text-gray-600">
            <form action="" method="GET" class="flex">
                <div class="ml-2 sm:ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                            <ion-icon class="text-gray-500 sm:text-sm" name="search-outline"></ion-icon>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-2 sm:ml-6">
                    <button type="submit" class="bg-slate-800 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-2 py-2 hidden sm:table-cell">ID</th>
                <th class="px-4 py-2">người đánh giá</th>
                <th class="px-4 py-2 hidden sm:table-cell">sản phẩm đánh giá</th>
                <th class="px-4 py-2">nội dung đánh giá</th>
                <th class="px-4 py-2 hidden sm:table-cell">sao đánh giá</th>
                <th class="px-4 py-2 hidden sm:table-cell">ngày đánh giá</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $index => $review)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-2 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $review->id }}</td>
                <td class="px-4 py-2 ">{{ $review->user->name}}</td>
                <td class="px-4 py-2">{{ $review->product->product_name}}</td>
                <td class="px-4 py-2 hidden sm:table-cell hidden1 cursor-pointer">
                    <p onclick="toggleContent(this)">Nội dung</p>
                    <div class="content">
                      <p class="p-3">{{ $review->comment}}</p>
                      <span class="close-button" onclick="closeContent(this)">
                        X
                      </span>
                </div>
                  </td>
                  <td class="px-4 py-2">
                    <?php for ($i = 0; $i < $review->rating; $i++) { ?>
                      *
                    <?php } ?>
                  </td>
                <td class="px-4 py-2 hidden sm:table-cell">{{ $review->created_at}}</td>
                <td class="px-4 py-2"><button type="submit"
                    class="bg-red-800 text-white font-bold py-2 px-3 rounded"></i></button></td>
                    <td class="px-4 py-2">
                        <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded">
                                X
                            </button>
                        </form>
                      </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end mr-8">
        {{-- <div>
            {{ $products->links() }}
        </div> --}}
    </div>
</div>

<script>
    function toggleContent(element) {
      var content = element.nextElementSibling;
      if (content.style.display === "none") {
        content.style.display = "block";
      } else {
        content.style.display = "none";
      }
    }

    function closeContent(element) {
      element.parentElement.style.display = "none";
    }
  </script>
@include('admin.layout.fotter')