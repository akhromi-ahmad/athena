<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <main>
        <h1>Signup</h1>

        <form method="post" action="/signup">
            @csrf

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
                <input id="password" name="password" type="password" autocomplete="new-password" required>
                @error('password')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div>
                <button type="submit">Signup</button>
            </div>

            <br>

            <div>
                <button type="button" onclick="window.location.href='/login'">Login</button>
            </div>
        </form>
    </main>
</body>

</html>
