@include('public.header.index')
<br>
<style>
    .register {
        position: relative;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
</style>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <div class="register min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="w-9/12">
            <div class="  rounded-md flex flex-col sm:flex-row">
                <div class="image hidden md:block md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden relative">
                    <img src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/09/hinh-nen-may-tinh-4k-cong-nghe-4.jpg" alt="Image" class="h-full w-full max-w object-cover">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                        <p class="text-4xl md:text-5xl lg:text-6xl  font-bold text-white">Hello</p>
                        <p class="xl:text-2xl 2xl:text-3xl text-white">Please provide the following information in the registration form.</p>
                    </div>
                </div>
                <div class="md:w-1/2 sm:px-6 py-4 bg-white rounded-lg bg-opacity-60">
                    <h2 class="text-2xl font-bold mb-6 text-center">Đăng ký</h2>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"></button>
                            <button class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"></button>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Or register with:</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 w-11/12 m-auto">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" id="name" name="name" class="border border-gray-300 p-2 rounded w-full">
                            @error('name')
                            <small class="text-red-500">{{$message}}</small>   
                           @enderror
                        </div>
                        <div class="mb-4 w-11/12 m-auto">
                            <label for="gmail" class="block text-gray-700">Gmail:</label>
                            <input type="email" id="gmail" name="email" class="border border-gray-300 p-2 rounded w-full">
                            @error('email')
                            <small class="text-red-500">{{$message}}</small>   
                           @enderror
                        </div>
                        <div class="mb-4 flex  w-11/12 m-auto">
                            <div class="w-1/2  md:w-full">
                                <label for="password" class="block text-gray-700">Password:</label>
                                <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded w-full">
                                @error('password')
                                <small class="text-red-500">{{$message}}</small>   
                               @enderror
                            </div>
                            <div class="w-1/2  md:w-full">
                                <label for="confirm-password" class="block text-gray-700">Confirm Password:</label>
                                <input type="password" id="confirm-password" name="password_confirmation" class="border border-gray-300 p-2 rounded w-full" >
                                @error('password')
                                <small class="text-red-500">{{$message}}</small>   
                               @enderror
                            </div>
                        </div>
                        <div class="mb-4 w-11/12 m-auto">
                            <label for="phone" class="block text-gray-700">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="border border-gray-300 p-2 rounded w-full">
                            @error('phone')
                            <small class="text-red-500">{{$message}}</small>   
                           @enderror
                        </div>
                        <div class="flex mb-4 w-11/12 m-auto">
                            <div class="w-full ">
                                <label for="address" class="block text-gray-700">Address:</label>
                                <input type="text" id="address" name="address" class="border border-gray-300 p-2 rounded w-full">
                                @error('address')
                                <small class="text-red-500">{{$message}}</small>   
                               @enderror
                            </div>
                        </div>
                        <div class="flex items-center mt-3 justify-center">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-5">Register</button>
                            <p class="ml-5 sm:text-xl text-sm">Bạn đã có tài khoản? Hãy ấn <a href="{{route('login')}}" class="text-green-500">Đăng nhập</a>.</p>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
    @include('public.footer.footer')
