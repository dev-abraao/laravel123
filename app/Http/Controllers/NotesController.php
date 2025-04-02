<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::query()->where('user_id', request()->user()->id )->orderBy('created_at', 'desc')->paginate(10);
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string', 'max:30'],
        ]);

        $data['user_id'] = $request->user()->id;
        $note = Notes::create($data);
        return to_route('notes.show', $note)->with('message', 'Note created successfully');
     }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.show', ['notes' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.edit', ['notes' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'note' => ['required', 'string', 'max:30'],
        ]);

        $note->update($data);
        return to_route('notes.show', $note)->with('message', 'Note was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $note->delete();
        return to_route('notes.index')->with('message', 'Note was deleted sucessfully');
    }
}
