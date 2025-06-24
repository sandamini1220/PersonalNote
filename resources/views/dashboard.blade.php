@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Welcome, {{ $user->name }} ({{ $user->role }})</h1>

    <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ New Note</a>

    @if(session('success'))
        <p class="mt-4 text-green-600">{{ session('success') }}</p>
    @endif

    <!-- Search form -->
    <form method="GET" action="{{ route('dashboard') }}" class="mt-6 mb-4">
        <input type="text" name="search" placeholder="Search notes..." value="{{ request('search') }}"
               class="border p-2 rounded w-full md:w-1/2">
    </form>

    <div class="mt-6 space-y-4">
        @forelse($notes as $note)
            <div class="p-4 border rounded shadow">
                <h2 class="text-xl font-semibold">{{ $note->title }}</h2>
                <p class="mt-1">{{ $note->content }}</p>
                <p class="text-sm text-gray-500">By: {{ $note->user->name ?? 'Unknown' }}</p>
                <div class="mt-2">
                    <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-600">Edit</a>
                    |
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete note?')" class="text-red-600">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No notes found.</p>
        @endforelse
    </div>

    <!-- Pagination links -->
    <div class="mt-6">
        {{ $notes->links() }}
    </div>
</div>
@endsection
