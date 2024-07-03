<style>
    .user_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20">
    <form action="{{ route('add_user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Thêm thành viên</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="Tên" class="block text-sm font-medium text-gray-700 mb-1">Tên</label>
                        <input type="text" name="username" id="username" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập tên" required>
                    </div>
                    <div class="mb-4">
                        <label for="Mật khẩu" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                        <input type="text" name="password" id="password" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="Email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="text" name="password" id="password" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập gmail" required>
                </div>
                <div class="mb-4">
                    <label for="Địa chỉ" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                    <input type="text" name="password" id="password" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" placeholder="Nhập địa chỉ" required>
                </div>
                <div class="mb-4">
                    <label for="Trạng thái" class="block text-sm font-medium text-gray-700 mb-1">Phân quyền</label>
                    <select name="is_activated" id="is_activated" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                        <option value="1">admin</option>
                        <option value="2">Nhân viên</option>
                        <option value="3">Người dùng</option>
                    </select>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.layout.fotter')