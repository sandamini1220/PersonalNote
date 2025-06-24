<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $query = Note::query();

        if ($user->role === 'user') {
            $query->where('user_id', $user->id);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $notes = $query->latest()->paginate(5);

        return view('dashboard', compact('notes', 'user'));
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Note created successfully!');
    }

    public function edit(Note $note)
    {
        if (Auth::user()->role !== 'admin' && $note->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        if (Auth::user()->role !== 'admin' && $note->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('dashboard')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        if (Auth::user()->role !== 'admin' && $note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('dashboard')->with('success', 'Note deleted successfully!');
    }
}
