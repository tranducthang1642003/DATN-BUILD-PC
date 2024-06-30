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

<div class="bg flex justify-center items-center p-10 bg-gray-100">
    <div class="card w-96  rounded-lg shadow-lg">
        <h2 class="card-header text-3xl font-bold text-center py-4 text-white bg-blue-800">Verify Token</h2>
        
        <form action="{{ route('verify.token.verify') }}" method="POST" class="w-full  bg-white rounded-bottom shadow-lg p-6 bg-white bg-opacity-60">
            <p class="text-lg text-gray-600 mb-6 p-2">Please enter the verification token you received in your email!!</p>
            @csrf
            <div class="flex items-center mb-4">
                <label for="token" class="block bg-blue-500 text-white rounded-l-lg w-36 p-1 h-full">Verification Token:</label>
                <input type="text" id="token" name="token" required class="flex-1 px-4 p-4 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 h-full">
            </div>
            <div class="flex items-center justify-center">
            <button type="submit" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded color-changing">Submit</button>
            </div>
        </form>
    </div>
</div>

@include('public.footer.footer')