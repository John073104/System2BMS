<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Paper::create($validated);

        return redirect()->route('clearances.index')->with('success', 'Paper added successfully!');
    }

    public function edit($id)
    {
        $paper = Paper::findOrFail($id);

        return view('clearances.edit', compact('paper'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $paper = Paper::findOrFail($id);
        $paper->update($validated);

        return redirect()->route('clearances.index')->with('success', 'Paper updated successfully!');
    }

    public function destroy($id)
    {
        $paper = Paper::findOrFail($id);
        $paper->delete();

        return redirect()->route('clearances.index')->with('success', 'Paper deleted successfully!');
    }
    public function index()
    {
        // Fetch all papers from the database
        $papers = Paper::all();

        // Pass the papers to the Blade view
        return view('clearances.index', compact('papers'));

    }
}
