<style>
    .user_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')
<div class="mx-8 pt-20  w-full">
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
            <form action="{{ route('product') }}" method="GET" class="flex">
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
                    <button type="submit" class="bg-main text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-md">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table-auto w-full my-6 rounded-lg overflow-hidden text-sm">
        <thead>
            <tr class="text-left bg-main">
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Tên</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Số điện thoại</th>
                <th class="px-4 py-2">Địa chỉ</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">Cập nhật lần cuối</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="{{ $index % 2 == 0 ? 'bg-darks' : 'bg-main' }}">
                <td class="px-4 py-2"><input type="checkbox"></td>
                <td class="px-4 py-2">{{ $user->id }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">{{ $user->phone }}</td>
                <td class="px-4 py-2">{{ $user->address }}</td>
                <td class="px-4 py-2 status-cell flex items-center mt-2">
                    <span class="status-indicator {{ $user->is_activated == '1' ? 'active' : 'inactive' }}" title="{{ ucfirst($user->is_activated) }}"></span>
                    <div class="relative">
                        <select class="status-select bg-main text-sm rounded-md p-1 pr-12 outline-none" data-order-id="{{ $user->id }}">
                            <option value="0" {{ $user->is_activated == '0' ? 'selected' : '' }}>Không hoạt động</option>
                            <option value="1" {{ $user->is_activated == '1' ? 'selected' : '' }}>Kích hoạt</option>
                        </select>
                    </div>
                </td>
                <td class="px-4 py-2">{{ $user->updated_at }}</td>
                <td class="px-4 py-2">
                    <div x-data="{ isOpen: false }" x-init="() => { isOpen = false }" @click.away="isOpen = false" class="detail-btn">
                        <button @click="isOpen = !isOpen" class="text-white pl-4 pt-2 focus:outline-none text-2xl">...</button>
                        <div x-show="isOpen" class="absolute right-8 mt-2 w-20 bg-main border rounded-md shadow-lg z-10" @click="isOpen = false">
                            <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="block pl-4 py-2 text-white hover:bg-gray-800">Sửa</a>
                            <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full text-left pl-4 py-2 text-red-400 hover:bg-gray-800 hover:text-red-500">Xóa</button>
                            </form>
                        </div>
                    </div>
                    <form class="hidden update-form" method="POST" action="{{ route('update_user_status', ['user' => $user->id]) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="number" name="active_new" class="bg-white border border-gray-300 rounded-md p-1 outline-none hidden" value="">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-2 rounded-md update-btn">Cập nhật</button>
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

                statusIndicator.className = `status-indicator ${
                    newStatus == '1' ? 'active' :
                    'inactive'
                }`;
                statusIndicator.title = ucfirst(newStatus == "1" ? 'active' : 'inactive');
            });
        });

        function ucfirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    });
</script>
@include('admin.layout.fotter')