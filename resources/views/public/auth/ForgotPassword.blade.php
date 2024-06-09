<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="mt-5 flex items-center justify-center">
  <div class="max-w-6xl w-full mx-auto">
    <div class="bg-white shadow-md rounded-md flex flex-col sm:flex-row">
      <div class="w-full sm:w-1/2 pr-0 sm:pr-4">
        <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-center">Forgot Password</h2>
        
        <form>
          <div class="mb-4 p-5">
            <label for="Email" class="block text-gray-700">Email:</label>
            <input type="email" id="name" name="name" class="border border-gray-300 p-2 rounded w-full" required>
        </div>
        <div class="flex items-center justify-between mt-3 p-5">
          <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">submit</button>
        </div>
        </form>
      </div>
      <div class="image-container" style="position: relative; display: inline-block;">
        <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" alt="Image" class="h-full w-full object-cover">
        <p class="image-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #ffffff; font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold; text-align: center; padding: 10px; border-radius: 10px;"></p>
      </div>
    </div>
  </div>
</div>