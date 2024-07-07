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
<div class="bg flex justify-center items-center p-10 bg-gray-100">
    <div class="card w-96  rounded-lg shadow-lg">
        <h2 class="card-header text-3xl font-bold text-center py-4 text-white bg-blue-800">Reset Password</h2>
    <form method="POST" action="{{ route('password.store') }}" class="w-full  bg-white rounded-bottom shadow-lg p-6 bg-white bg-opacity-60">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        

        <div class="mb-4">
            <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('email') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                
            @endif
            @error('email')
            <small class="text-red-500">{{$message}}</small>   
           @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-lg font-semibold text-gray-700">Password</label>
            <input id="password" class="block mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('password') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-lg font-semibold text-gray-700">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" type="password" name="password_confirmation" required autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('password_confirmation') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <button type="submit" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded color-changing">Reset Password</button>
        </div>
    </form>
</div>
</div>

@include('public.footer.footer')