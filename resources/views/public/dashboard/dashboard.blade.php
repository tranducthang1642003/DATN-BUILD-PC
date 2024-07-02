@include('public.dashboard.layout.header')
<div class="bg-white p-4 col-span-7 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold mb-4 bg-blue-200 flex justify-center items-center p-3 rounded-lg shadow-lg">Dashboard</h1> 
    <div class="flex  justify-end">
        <a href="{{route('update_auth')}}" class="px-5 py-1 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded color-changing mb-2">Edit</a>
    </div>
    <div class="bg-yellow-200 p-4 rounded-md rounded-lg shadow-lg">
        <p class="border-yellow-500 border-b p-3 ">
            <strong><i class="fa-solid fa-user"></i> Username:</strong> {{$users->name}}
        </p>
        <p class="border-yellow-500 border-b p-3">
            <strong><i class="fa-solid fa-envelope"></i> Email:</strong> {{$users->email}}
        </p>
        <p class="border-yellow-500 border-b p-3">
            <strong><i class="fa-solid fa-user-secret"></i> Role:</strong> {{$users->role}}
        </p>
        <p class="border-yellow-500 border-b p-3">
            <strong><i class="fa-solid fa-location-dot"></i> Address:</strong> {{$users->address}}
        </p>
        <p class="p-3">s
            <strong><i class="fa-solid fa-phone"></i> Phone:</strong> {{$users->phone}}
        </p>
        
    </div>
</div>
@include('public.dashboard.layout.footer')