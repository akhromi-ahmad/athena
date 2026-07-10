@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('user.login') }}">
        @csrf

        <div>
            <label for="username">Username</label>
            <input class="border border-gray-400 rounded px-2 py-1" type="text" id="username" name="username"
                value="{{ old('username') }}" autocomplete="username" required>
            @error('username')
                <div class="bg-red-500 text-white p-2 rounded mb-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input class="border border-gray-400 rounded px-2 py-1" type="password" id="password" name="password"
                autocomplete="current-password" required>
            @error('password')
                <div class="bg-red-500 text-white p-2 rounded mb-4">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button class="border border-gray-400 rounded px-2 py-1" type="submit">Login</button>
        </div>
    </form>

    <div>
        <a href="{{ route('signup') }}" class="...">Signup</a>
        <a href="{{ route('login') }}" class="...">Login</a>
    </div>
@endsection
