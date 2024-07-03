<style>
    .user_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')
<div class="m-4 pt-20">
    <div class="flex justify-between text-sm">
        <div class="flex text-gray-600">
            <form action="{{ route('user') }}" method="GET" class="flex">
                <div>
                    <label for="startDate">Từ ngày</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="startDate" name="start_date">
                </div>
                <div class="ml-4">
                    <label for="endDate">Đến ngày</label>
                    <input class="p-2 rounded-lg ml-2" type="date" id="endDate" name="end_date">
                </div>
                <div class="ml-6">
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"><ion-icon name="search-outline"></ion-icon></span>
                        </div>
                        <input type="text" name="keyword" id="keyword" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="ml-6">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden">
        <thead>
            <tr class="text-left bg-gray-400">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Tên</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Số điện thoại</th>
                <th class="px-4 py-2">Địa chỉ</th>
                <th class="px-4 py-2">Token</th>
                <th class="px-4 py-2">Cập nhật lần cuối</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $user->id }}</td>
                <td class="px-4 py-2">{{ $user->username }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">{{ $user->phone }}</td>
                <td class="px-4 py-2">{{ $user->address }}</td>
                <td class="px-4 py-2">{{ $user->remember_token }}</td>
                <td class="px-4 py-2">{{ $user->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:bg-gray-300 hover:bg-gray-300 text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Sửa</a>
                            <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">Xóa</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end mr-8">
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
@include('admin.layout.fotter')