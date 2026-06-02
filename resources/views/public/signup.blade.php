<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg: #313131;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #0f766e;
            --accent-hover: #115e59;
            --border: #d1d5db;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background: #000000;
        }

        .card {
            width: min(92vw, 380px);
            padding: 1.5rem;
            background: var(--card);
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        h1 {
            margin: 0 0 1rem;
            font-size: 1.4rem;
        }

        p {
            margin: 0 0 1rem;
            color: var(--muted);
            font-size: 0.95rem;
        }

        form {
            display: grid;
            gap: 0.85rem;
        }

        label {
            font-size: 0.9rem;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 0.65rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            margin-top: 0.35rem;
        }

        .actions {
            display: flex;
            gap: 0.6rem;
            margin-top: 0.2rem;
        }

        button {
            flex: 1;
            padding: 0.65rem 0.75rem;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            cursor: pointer;
        }

        .btn-login {
            background: var(--accent);
            color: #fff;
        }

        .btn-login:hover {
            background: var(--accent-hover);
        }

        .btn-reset {
            background: #e5e7eb;
            color: #111827;
        }
    </style>
</head>

<body>
    <main class="card">
        <h1>Signup</h1>
        <br>

        <form method="post" action="/signup">
            @csrf

            @error('general')
            <div style="color:#b91c1c;margin-bottom:0.5rem;font-size:0.95rem">{{ $message }}</div>
            @enderror

            <label for="username">
                Username
                <input id="username" name="username" type="text" autocomplete="username" required value="{{ old('username') }}">
                @error('username')
                <div style="color:#b91c1c;margin-top:0.25rem;font-size:0.9rem">{{ $message }}</div>
                @enderror
            </label>

            <label for="password">
                Password
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password')
                <div style="color:#b91c1c;margin-top:0.25rem;font-size:0.9rem">{{ $message }}</div>
                @enderror
            </label>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="actions">
                <button class="btn-login" type="submit">
                    Signup
                </button>
            </div>
            <div class="actions">
                <button class="btn-login" type="button" onclick="window.location.href='/login'" style="background: #0066cc; color: #ffffff;">
                    Login
                </button>
            </div>
        </form>
    </main>
</body>

</html>