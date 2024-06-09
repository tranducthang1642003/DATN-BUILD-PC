  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <div class="mt-5 flex items-center justify-center">
    <div class="max-w-6xl w-full mx-auto">
      <div class="bg-white shadow-md rounded-md flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/2 pr-0 sm:pr-4">
          <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-center">Login</h2>
          <div class="text-center">
            <div class="flex items-center justify-center gap-2">
              <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
              <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
            </div>
            <p class="text-sm text-gray-600 mb-2">Or sign in with:</p>
          </div>
          <form>
            <div class="mb-6 p-5">
              <label for="email" class="block mb-2 text-sm sm:text-base font-medium text-gray-600">Email</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
  
            <div class="mb-6 p-5">
              <label for="password" class="block mb-2 text-sm sm:text-base font-medium text-gray-600">Password</label>
              <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="flex items-center gap-2 p-5">
              <input type="checkbox" id="save-password" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
              <label for="save-password" class="text-sm sm:text-base text-gray-600">Có muốn lưu mật khẩu?</label>
            </div>
            <div class="flex items-center justify-between mt-3 p-5">
              <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Sign In</button>
              <a href="" class="text-sm sm:text-base text-blue-500 hover:text-blue-600">Forgot Password?</a>
            </div>
          </form>
        </div>
        <div class="image-container" style="position: relative; display: inline-block;">
          <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" alt="Image" class="h-full w-full object-cover">
          <p class="image-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #ffffff; font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold; text-align: center; padding: 10px; border-radius: 10px;">CHAO MUNG DEN   MTECH COMPUTER</p>
        </div>
      </div>
    </div>
  </div>