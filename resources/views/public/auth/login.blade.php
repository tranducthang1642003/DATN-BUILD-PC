@include('public.header.index')
<style>
    .login {
        position: relative;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
</style>
  <div class="login min-h-screen bg-gray-100 flex items-center  justify-center">
    <div class="w-9/12">
        <div class="bg-white  rounded-md flex flex-col sm:flex-row">
            <div class="md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-center items-center relative">
                <img src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg" alt="Image" class="h-full w-full max-w object-cover">
                <p class="image-text text-sm md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold bg-opacity-75 px-6 py-4 rounded-lg mb-6">WELCOME!</p>
                <p class="image-text text-sm md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold bg-opacity-75 px-6 py-4 rounded-lg mt-3">Please log in to continue.</p>
              </div>
            <div class="__login md:w-1/2 sm:px-6 py-4 bg-white rounded-lg opacity-80">
                <h2 class="text-2xl font-bold mb-6 text-center">LOGIN</h2>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2">
                        <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
                        <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Or login with:</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="mb-4">
                    <label for="gmail" class="block text-gray-700">Gmail:</label>
                    <input type="email" id="gmail" name="email" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                    <div class="mb-4">
                        <label for="gmail" class="block text-gray-700">password:</label>
                        <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex items-center gap-2 p-5">
                      <input type="checkbox" id="save-password" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                      <label for="save-password" class="text-sm sm:text-base text-gray-600">Có muốn lưu mật khẩu?</label>
                    </div>
                    <div class="flex items-center mt-3 justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-5">login</button>
                        <p class="ml-5">Bạn chưa có tài khoản? Hãy ấn <a href="/login" class="text-green-500">register</a>.</p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@include('public.footer.footer')