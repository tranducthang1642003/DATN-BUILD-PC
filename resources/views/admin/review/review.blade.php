<style>
  .review_active {
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
<div class="mx-8 pt-20 w-full">
  <div class="text-base flex items-center mb-8 text-slate-400">
    <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
    <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
    <span>Others</span>
    <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
    <span>Cài đặt</span>
    <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
    <a class="hover:text-slate-50" href="{{ route('adminreview') }}"><span>Bình luận</span></a>
  </div>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
  <div class="flex justify-between text-sm">
    <div class="flex text-white">
      <form action="{{ route('adminreview') }}" method="GET" class="flex">
        <div class="ml-2 sm:ml-4 flex">
          <label for="startDate" class="block text-gray-500 mt-1">Từ ngày</label>
          <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="startDate" name="start_date">
        </div>
        <div class="ml-2 sm:ml-4 flex">
          <label for="endDate" class="block text-gray-500 mt-1">Đến ngày</label>
          <input class="p-1.5 sm:p-2 rounded-lg ml-2 bg-main text-gray-500 text-sm" type="date" id="endDate" name="end_date">
        </div>
        <div class="ml-2 sm:ml-6">
          <div class="relative rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
              <ion-icon class="text-white sm:text-sm" name="search-outline"></ion-icon>
            </div>
            <input type="text" name="keyword" id="keyword" class="block w-full bg-main rounded-md border-0 py-1.5 sm:py-2 pl-5 pr-16 text-white ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
          </div>
        </div>
        <div class="ml-2 sm:ml-6">
          <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-slate-700 px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
        </div>
      </form>
    </div>
    @if (session('success'))
    <div id="alert" class="border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md" style="background-color: #4CAF50; color: #fff" role="alert">
      <p class="font-bold">{{ session('success') }}</p>
    </div>
    @elseif (session('errors'))
    <div id="alert" class="border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md" style="background-color: #f44336; color: #fff" role="alert">
      <p class="font-bold">{{ session('errors') }}</p>
    </div>
    @endif
  </div>
  <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm text-slate-700">
    <thead>
      <tr class="text-left bg-primary">
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
      <tr class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-pale-dark' }}">
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
        <td class="px-4 py-2"><button type="submit" class="bg-red-800 text-white font-bold py-2 px-3 rounded"></i></button></td>
        <td class="px-4 py-2">
          <form action="{{ route('review.destroy', $review->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded">
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