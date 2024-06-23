@include('public.header.index')
  <div class="min-h-screen bg-gray-100 flex items-center justify-center" style="background-image: linear-gradient( 109.6deg, rgba(156,252,248,1) 11.2%, rgba(110,123,251,1) 91.1% )">
    <div class="container mx-auto">
        <div class="bg-white  rounded-md flex flex-col sm:flex-row">
            <div class="md:w-1/2 sm:px-6 py-4 bg-white rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Forgotpassword</h2>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2">
                        <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
                        <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
                    </div>
                </div>
                <form>
                  <div class="mb-4">
                    <label for="gmail" class="block text-gray-700">Gmail:</label>
                    <input type="email" id="gmail" name="gmail" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                    <div class="flex items-center mt-3 justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-5">Submit</button>
                        
                    </div>
                </form>
            </div>
            <div class="md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-center items-center relative">
              <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" alt="Image" class="h-full w-full object-cover">
              <p class="image-text text-sm md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold bg-opacity-75 px-6 py-4 rounded-lg">Bạn đang ở trang Forgotpassword</p>
          </div>
        </div>
    </div>
</div>
@include('public.footer.footer')
