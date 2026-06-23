<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <h1>Login</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form method="post" action="{{ route('user.login') }}">
            @csrf

            @error('message')
                <div>{{ $message }}</div>
            @enderror

            @error('general')
                <div>{{ $message }}</div>
            @enderror

            <div>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" autocomplete="username" required
                    value="{{ old('username') }}" class="border border-gray-400 rounded px-2 py-1">
                @error('username')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                    class="border border-gray-400 rounded px-2 py-1">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <button type="submit" class="border border-gray-400 rounded px-2 py-1">Login</button>
            </div>

            <br>

            <div>
                <button type="button" onclick="window.location.href='/signup'"
                    class="border border-gray-400 rounded px-2 py-1">Signup</button>
            </div>
        </form>
    </main>
</body>

</html>
