<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded-md flex flex-col sm:flex-row">
            <div class="md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-center items-center">
                <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" alt="Image" class="h-full w-full object-cover">
                <p class="image-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-100%, -50%); color: #ffffff; font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold; text-align: center; padding: 10px; border-radius: 10px;">Chào mừng bạn đến với chúng tôi</p>
            </div>
            <div class="md:w-1/2 sm:px-6 py-4 bg-white rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Đăng ký</h2>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2">
                        <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
                        <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Or register with:</p>
                </div>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name:</label>
                        <input type="text" id="name" name="name" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="gmail" class="block text-gray-700">Gmail:</label>
                        <input type="email" id="gmail" name="gmail" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4 flex">
                        <div class="w-1/2 mr-2">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="w-1/2 ml-2">
                            <label for="confirm-password" class="block text-gray-700">Confirm Password:</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Phone:</label>
                        <input type="tel" id="phone" name="phone" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2 mr-2">
                            <label for="address" class="block text-gray-700">Address:</label>
                            <input type="text" id="address" name="address" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="w-1/2 mr-2">
                            <label for="image" class="block text-gray-700">Image:</label>
                            <input type="file" id="image" name="image" class="border border-gray-300 p-2 rounded w-full" accept="image/*" required>
                        </div>
                    </div>
                    <div class="flex items-center mt-3 justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-5">register</button>
                        <p class="ml-5">Bạn đã có tài khoản? Hãy ấn <a href="/login" class="text-green-500">Đăng nhập</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>