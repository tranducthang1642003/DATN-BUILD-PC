<style>
    .user_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="m-4 pt-20">
    <form action="{{ route('add_user') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="min-h-screen bg-slate-100 flex justify-center items-center flex-col px-6 pb-12 lg:px-8">
            <h2 class="mb-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Thêm thành viên</h2>
            <div class="  w-full max-w-2xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Tên</label>
                        <input type="text" name="username" id="username" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập số điện thoại" required>
                        <span id="phone-error" class="text-red-500 text-sm"></span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Email</label>
                    <input type="email" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập email" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập mật khẩu" required>
                        <span id="password-error" class="text-red-500 text-sm"></span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập địa chỉ" required>
                </div>
                <div class="mb-4">
                    <label for="is_activated" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Phân quyền</label>
                    <select name="is_activated" id="is_activated" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        <option value="0">Người dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-slate-500 text-white px-6 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:bg-slate-600">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function validateForm() {
            var isValid = true;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            var passwordErrorSpan = document.getElementById("password-error");

            if (password !== confirmPassword) {
                passwordErrorSpan.textContent = "Mật khẩu và xác nhận mật khẩu không khớp!";
                isValid = false;
            } else {
                passwordErrorSpan.textContent = "";
            }
            var phone = document.getElementById("phone").value;
            var phoneErrorSpan = document.getElementById("phone-error");
            var phoneRegex = /^[0-9]{10,11}$/;
            if (!phoneRegex.test(phone)) {
                phoneErrorSpan.textContent = "Số điện thoại không hợp lệ!";
                isValid = false;
            } else {
                phoneErrorSpan.textContent = "";
            }
            return isValid;
        }
    </script>


    @include('admin.layout.fotter')