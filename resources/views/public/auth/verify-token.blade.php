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
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="bg flex justify-center items-center p-10 bg-gray-100 border ">
    <div class="card w-96  rounded-lg shadow-lg ">
        <h2 class="card-header text-3xl font-bold text-center py-4 text-white bg-blue-800">Verify Token</h2>
        
        <form action="{{ route('verify.token.verify') }}" method="POST" class="w-full  bg-white rounded-bottom shadow-lg p-6 bg-white bg-opacity-60 ">
            <p class="text-sm text-gray-600 mb-6 sm:text-xl">Please enter the verification token you received in your email!!</p>
            @csrf
            <div class="mb-4">
                <label for="token" class="block text-lg font-semibold text-gray-700 mb-2">Verification Token:</label>
                <input type="text" id="token" name="token" required class="border border-gray-300 p-2 rounded w-full">
                @error('token')
                <small class="text-red-500">{{$message}}</small>   
               @enderror
               @error('email')
               <small class="text-red-500">{{$message}}</small>   
              @enderror
            </div>
            <div class="flex justify-center items-center mt-4 ">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">Submit</button>
            </div>
        </form>
    </div>
</div>

@include('public.footer.footer')