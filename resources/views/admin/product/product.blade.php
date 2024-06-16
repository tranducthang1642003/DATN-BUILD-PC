<style>
    .products_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>
@include('admin.layout.header')
<div class="flex-grow p-5 ml-10">
    <div class="flex justify-between text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('product') }}" method="GET" class="flex">
                <div>
                    <label for="startDate">From</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-4">
                    <label for="endDate">To</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"><ion-icon name="search-outline"></ion-icon></span>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search">
                    </div>
                </div>
                <div class="ml-6">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Search</button>
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('add') }}">
                <button class="bg-green-700 text-white p-2 rounded-lg text-xm flex justify-center">
                    <ion-icon class="text-xl" name="add-outline"></ion-icon> Add product
                </button>
            </a>
        </div>
    </div>

    <!-- Status Filters -->
    <div class="flex my-6">
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product') }}" class="flex {{ request('status') == null ? 'selected' : '' }}">
                <span {{ request('status') == null ? 'class=text-yellow-500' : '' }}>All</span>
                <div class="icon_count ml-1 bg-yellow-500">{{ $statusCounts[4] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '1']) }}" class="flex {{ request('status') == '1' ? 'selected' : '' }}">
                <span {{ request('status') == '1' ? 'class=text-yellow-500' : '' }}>Active</span>
                <div class="icon_count ml-1">{{ $statusCounts[1] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '2']) }}" class="flex {{ request('status') == '2' ? 'selected' : '' }}">
                <span {{ request('status') == '2' ? 'class=text-yellow-500' : '' }}>Draft</span>
                <div class="icon_count ml-1">{{ $statusCounts[2] }}</div>
            </a>
        </div>
        <div class="px-4 border-b-2 py-1">
            <a href="{{ route('product', ['status' => '3']) }}" class="flex {{ request('status') == '3' ? 'selected' : '' }}">
                <span {{ request('status') == '3' ? 'class=text-yellow-500' : '' }}>Deleted</span>
                <div class="icon_count ml-1">{{ $statusCounts[3] }}</div>
            </a>
        </div>
    </div>

    <!-- Selected Actions -->
    <div class="flex">
        <span>0 product selected</span>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-purple-700 " name="bag-check-outline"></ion-icon>Out of Stock</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-fuchsia-600 " name="cash-outline"></ion-icon>On Sale</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-blue-400 " name="apps-outline"></ion-icon>Select All</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-blue-700 " name="file-tray-full-outline"></ion-icon>Print QR</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-sky-500 " name="exit-outline"></ion-icon>Export</button>
        <button class="button_selected"><ion-icon class="mr-2 mb-1 text-red-500 " name="trash-outline"></ion-icon>Delete</button>
    </div>

    <!-- Product Table -->
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Product Info</th>
                <th class="px-4 py-2">Brand</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Last Update</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $product->id }}</td>
                <td class="px-4 py-2 flex">
                    <img src="{{ asset('image/pc_demo.jpg') }}" width="50" alt="">
                    <div class="pl-2">
                        <p>{{ $product->name }}</p>
                        <span>{{ $product->product_code }}</span>
                    </div>
                </td>
                <td class="px-4 py-2">{{ $product->brand->name }}</td>
                <td class="px-4 py-2">{{ $product->category->name }}</td>
                <td class="px-4 py-2">{{ $product->price }} VND</td>
                <td class="px-4 py-2">{{ $product->quantity }}</td>
                <td class="px-4 py-2">{{ $product->status }}</td>
                <td class="px-4 py-2">{{ $product->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:bg-gray-300 hover:bg-gray-300 text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit</a>
                            <form action="{{ route('delete_product', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-end mr-8">
        <div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@include('admin.layout.fotter')