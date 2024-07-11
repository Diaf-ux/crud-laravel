<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create() {
        return view('notes.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Note::create($validatedData);

        return redirect()->route('notes.index');
    }

    public function show($id) {
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    public function edit($id) {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Note::whereId($id)->update($validatedData);

        return redirect()->route('notes.index');
    }

    public function destroy($id) {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index');
    }
}
