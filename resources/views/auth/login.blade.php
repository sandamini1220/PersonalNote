@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-blue-50 px-4">
    <div class="bg-white shadow-2xl rounded-lg w-full max-w-md p-8">

        <!-- App Title -->
        <h1 class="text-3xl font-extrabold text-center text-gray-900 mb-1">Note App</h1>
        <p class="text-center text-gray-600 mb-6">Login to your note</p>

        <!-- Flash Message -->
        @if(session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border-2 border-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border-2 border-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Small Blue Login Button -->
            <div class="text-right -mt-2">
                <button type="submit" class="text-sm text-blue-600 hover:underline">
                    Login
                </button>
            </div>

            <!-- Main Gradient Login Button -->
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold py-2 px-4 rounded-md hover:from-blue-600 hover:to-blue-800 transition">
                    Login
                </button>
            </div>
        </form>

        <!-- Bottom Link -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
        </div>

    </div>
</div>
@endsection
