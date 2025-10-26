<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div>{{ $message }}</div> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <div>{{ $message }}</div> @enderror

        <button type="submit">Login</button>
    </form>
</body>
</html>
