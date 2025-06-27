@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">

    <!-- Create Note Button -->
    <div class="mb-6 text-right">
        <a href="{{ route('notes.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
            + New Note
        </a>
    </div>

    <!-- Flash -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Note List -->
    <div class="space-y-4">
        @forelse($notes as $note)
            <div class="p-4 bg-white rounded shadow flex justify-between items-start">
                <div>
                    <h2 class="text-lg font-semibold text-blue-700">{{ $note->title }}</h2>
                    <p class="text-gray-600 text-sm mt-1">{{ $note->content }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('notes.edit', $note->id) }}"
                       class="text-sm text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST"
                          onsubmit="return confirm('Delete this note?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-sm text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">No notes yet.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $notes->links() }}
    </div>
</div>
@endsection
