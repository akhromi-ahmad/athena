@extends('layouts.guest')
@section('title', 'Signup')

@section('content')
    <h1>Signup</h1>

    @error('general')
        <div class="bg-red-500 text-white p-2 rounded mb-4">
            {{ $message }}
        </div>
    @enderror

    <form method="post" action="{{ route('user.signup') }}">
        @csrf

        <label for="username">Username</label>
        <input id="username" name="username" type="text" autocomplete="username" required value="{{ old('username') }}"
            class="border border-gray-400 rounded px-2 py-1">
        @error('username')
            <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
        @enderror

        <br>

        <div>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required
                class="border border-gray-400 rounded px-2 py-1">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Password Confirmation</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                required class="border border-gray-400 rounded px-2 py-1">
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" class="border border-gray-400 rounded px-2 py-1">Signup</button>
        </div>
        <div>
            <a href="{{ route('signup') }}" class="...">Signup</a>
            <a href="{{ route('login') }}" class="...">Login</a>
        </div>
    @endsection
