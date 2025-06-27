@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-900 mb-1">Note App</h1>
        <p class="text-gray-600 mb-6">Create your account</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 border-2 border-purple-500 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border-2 border-purple-500 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border-2 border-purple-500 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border-2 border-purple-500 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-semibold py-2 rounded-md hover:from-purple-600 hover:to-purple-800 transition">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
