<style>
    .user_active {
        background: linear-gradient(to right, goldenrod, rgb(219, 183, 94));
        color: white;
    }
</style>

@include('admin.layout.header')

<div class="mx-8 pt-20 w-full">
    <div class="text-base flex items-center mb-8 text-slate-400">
        <a class="hover:text-slate-50" href="{{ route('admin') }}"><ion-icon name="home"></ion-icon></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Manage</span>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <a class="hover:text-slate-50" href="{{ route('user') }}"><span>Người dùng</span></a>
        <ion-icon class="mx-4 text-sm" name="chevron-forward"></ion-icon>
        <span>Chỉnh sửa</span>
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
    <form action="{{ route('update_user', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="text-slate-700 bg-slate-200 min-h-screen flex justify-center">
            <div class="w-full max-w-6xl">
                <h2 class="my-10 text-center text-2xl font-bold leading-9 tracking-tight ">Sửa thành viên</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium leading-6  mb-2">Tên</label>
                        <input type="text" name="username" id="username" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium leading-6  mb-2">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->phone }}" required>
                        <span id="phone-error" class="text-red-500 text-sm"></span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium leading-6  mb-2">Email</label>
                    <input type="email" name="email" id="email" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->email }}" readonly>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium leading-6  mb-2">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->password }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6  mb-2">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->password }}" required>
                        <span id="password-error" class="text-red-500 text-sm"></span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium leading-6  mb-2">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $user->address }}" required>
                </div>
                <div class="mb-4">
                    <label for="is_activated" class="block text-sm font-medium leading-6  mb-2">Phân quyền</label>
                    <select name="is_activated" id="is_activated" class="block w-full rounded-md border-0 py-1.5   shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        <option value="1" {{ $user->is_activated ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ !$user->is_activated ? 'selected' : '' }}>Người dùng</option>
                    </select>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Lưu</button>
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