<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

</head>

<body>
    <form method="POST" action="{{ route('password.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div>
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('email') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password">
            @if ($errors->has('password'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('password') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
                <div class="text-red-500 mt-2">
                    @foreach ($errors->get('password_confirmation') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Reset Password
            </button>
        </div>
    </form>

</body>

</html>
