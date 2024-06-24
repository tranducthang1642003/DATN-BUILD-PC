<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Token</title>
</head>
<body>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <h2>Verify Token</h2>
    <p>Please enter the verification token you received in your email:</p>
    <form action="{{ route('verify.token.verify') }}" method="POST">
    @csrf
        <div>
            <label for="token">Verification Token:</label>
            <input type="text" id="token" name="token" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>