@include('public.dashboard.layout.header')
<div class="bg-white p-4 col-span-7 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold mb-4 bg-blue-200 flex justify-center items-center p-3 rounded-lg shadow-lg">Edit Dashboard</h1> 
    <div class="bg-yellow-200    p-4 rounded-md rounded-lg shadow-lg">
        <form action="{{ route('update_auth') }}" method="POST">
            @csrf
            {{-- <p class="border-yellow-500 border-b p-3">
                <strong><i class="fa-solid fa-user"></i> Username:</strong>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </p>
            <p class="border-yellow-500 border-b p-3">
                <strong><i class="fa-solid fa-user-secret"></i> Role:</strong>
            </p>
            <p class="border-yellow-500 border-b p-3">
                <strong><i class="fa-solid fa-location-dot"></i> Address:</strong>
                <input type="text" name="address" value="{{ Auth::user()->address }}">
            </p>
            <p class="p-3">
                <strong><i class="fa-solid fa-phone"></i> Phone:</strong>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </p> --}}
            <div class="bg-yellow-200 p-4 rounded-md rounded-lg shadow-lg">
                <form action="{{ route('update_auth') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone:</label>
                        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address:</label>
                        <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:border-blue-500" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Update</button>
                </form>
            </div>
        </form>
    </div>
</div>
@include('public.dashboard.layout.footer')