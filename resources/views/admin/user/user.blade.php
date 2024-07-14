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
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">Cập nhật lần cuối</th>
                <th class="px-4 py-2">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $user->id }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">{{ $user->phone }}</td>
                <td class="px-4 py-2">{{ $user->address }}</td>
                <td class="px-4 py-2 status-cell flex">
                    <span class="status-indicator {{ $user->is_activated == '1' ? 'active' : 'inactive' }}" title="{{ ucfirst($user->is_activated) }}"></span>
                    <div class="relative">
                        <select class="status-select bg-white border border-gray-300 rounded-md p-1 outline-none" data-order-id="{{ $user->id }}">
                            <option value="0" {{ $user->is_activated == '0' ? 'selected' : '' }}>Không hoạt động</option>
                            <option value="1" {{ $user->is_activated == '1' ? 'selected' : '' }}>Kích hoạt</option>
                        </select>
                    </div>
                </td>
                <td class="px-4 py-2">{{ $user->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
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
                    <form class="hidden update-form" method="POST" action="{{ route('update_user_status', ['user' => $user->id]) }}">
                        @csrf
                        @method('POST')
                        <input type="text" name="user_id" value="{{ $user->id }}">
                        <input type="number" name="active_new" class="bg-white border border-gray-300 rounded-md p-1 outline-none" value="">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md update-btn">Cập nhật</button>
                    </form>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelects = document.querySelectorAll('.status-select');
        statusSelects.forEach(select => {
            select.addEventListener('change', function() {
                const orderId = this.dataset.orderId;
                const newStatus = this.value;

                const parentRow = this.closest('tr');
                const detailBtn = parentRow.querySelector('.detail-btn');
                const updateForm = parentRow.querySelector('.update-form');

                const statusInput = updateForm.querySelector('input[name="active_new"]');
                statusInput.value = newStatus;

                detailBtn.classList.add('hidden');
                updateForm.classList.remove('hidden');

                const statusCell = parentRow.querySelector('.status-cell');
                const statusIndicator = statusCell.querySelector('.status-indicator');

                statusIndicator.className = `status-indicator ${newStatus}`;
                statusIndicator.title = ucfirst(newStatus == "1" ? 'active' : 'inactive');
            });
        });

        function ucfirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    });
</script>
@include('admin.layout.fotter')