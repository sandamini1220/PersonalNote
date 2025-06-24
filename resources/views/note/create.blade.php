@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Create Note</h1>

    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <label class="block mb-2">Title</label>
        <input type="text" name="title" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Content</label>
        <textarea name="content" rows="5" class="w-full border p-2 mb-4" required></textarea>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Note</button>
    </form>
</div>
@endsection
