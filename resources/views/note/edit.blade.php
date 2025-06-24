@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <label class="block mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">New Password (optional)</label>
        <input type="password" name="password" class="w-full border p-2 mb-4">

        <label class="block mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 mb-4">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
    </form>
</div>
@endsection
