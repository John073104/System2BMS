<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.health.index', compact('medicines'));
    }

    public function create()
    {
        return view('admin.health.medicine.create');
    }

    public function store(Request $request)
    {
        Medicine::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]));

        return redirect()->route('health.medicine.index')->with('success', 'Medicine added successfully.');
    }

    public function edit(Medicine $medicine)
    {
        return view('admin.health.medicine.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]));

        return redirect()->route('health.medicine.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('health.medicine.index')->with('success', 'Medicine deleted successfully.');
    }
}
