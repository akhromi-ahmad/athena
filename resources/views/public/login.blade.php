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

    @error('message')
        <div>{{ $message }}</div>
    @enderror

    @error('general')
        <div>{{ $message }}</div>
    @enderror

    <form method="post" action="{{ route('user.login') }}">
        @csrf

        <div>
            <label for="username">Username</label>
            <input class="border border-gray-400 rounded px-2 py-1" type="text" id="username" name="username"
                autocomplete="username" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input class="border border-gray-400 rounded px-2 py-1" type="password" id="password" name="password"
                autocomplete="current-password" required>
        </div>

        <div>
            <button class="border border-gray-400 rounded px-2 py-1" type="submit">Login</button>
        </div>
    </form>

    <div>
        <button type="button" onclick="window.location.href='/signup'"
            class="border border-gray-400 rounded px-2 py-1">Signup</button>
    </div>
@endsection
