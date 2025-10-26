<x-layout>
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
</x-layout>
