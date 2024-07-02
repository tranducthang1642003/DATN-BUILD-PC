@include('public.header.index')
<style>
    .bg {
        position: relative;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
    @keyframes textChange {
        0% { color: #edfdff; }
        50% { color: #1c0055; } 
    }
    .color-changing {
        animation: textChange 5s infinite;
    }
</style>
<div class=" bg flex justify-center items-center p-10 bg-gray-100">
    <div class="card w-96  rounded-lg shadow-lg ">
        <h2 class="card-header text-3xl font-bold text-center py-4 text-white bg-cyan-600">Forgot Password</h2>
        @if (session('status'))
            <div class="success-message text-green-500 text-center py-2">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="px-6 pt-4 pb-6 bg-white bg-opacity-60">
            @csrf
            <div class="form-group mb-6">
                <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                @error('email')
                    <div class="error-message text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-800 color-changing">Send Password Reset Link</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('public.footer.footer') 