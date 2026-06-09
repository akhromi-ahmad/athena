<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <main>
        <h1>Login</h1>

        <form method="post" action="/login">
            @csrf

            @error('message')
            <div>{{ $message }}</div>
            @enderror

            @error('general')
            <div>{{ $message }}</div>
            @enderror

            <div>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" autocomplete="username" required value="{{ old('username') }}">
                @error('username')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <button type="submit">Login</button>
            </div>

            <br>

            <div>
                <button type="button" onclick="window.location.href='/signup'">Signup</button>
            </div>
        </form>
    </main>
</body>

</html>
