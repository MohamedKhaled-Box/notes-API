<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiNoteController extends Controller
{
    public function index()
    {
        $notes = Auth::user()->notes;
        return response()->json($notes, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Auth::user()->notes()->create($request->all());
        return response()->json($note, 201);
    }

    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return response()->json($note, 200);
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->all());
        return response()->json(['message' => 'Note updated successfully'], 200);
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}
