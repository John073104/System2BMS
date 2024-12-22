<?php
// app/Http/Controllers/HealthController.php
namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Personnel;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        $personnels = Personnel::all();
        return view('admin.health.index', compact('medicines', 'personnels'));
    }

    public function createMedicine($request)
    {
        $medicine = Medicine::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]));
        
        return redirect()->route('health.index')->with('success', 'Medicine added successfully.');
    }

    public function editMedicine(Medicine $medicine)
    {
        return view('admin.health.edit_medicine', compact('medicine'));
    }

    public function updateMedicine(Request $request, Medicine $medicine)
    {
        $medicine->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]));
        
        return redirect()->route('health.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroyMedicine(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('health.index')->with('success', 'Medicine deleted successfully.');
    }

    public function createPersonnel(Request $request)
    {
        $personnel = Personnel::create($request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]));
        
        return redirect()->route('health.index')->with('success', 'Personnel added successfully.');
    }

    public function editPersonnel(Personnel $personnel)
    {
        return view('admin.health.edit_personnel', compact('personnel'));
    }

    public function updatePersonnel(Request $request, Personnel $personnel)
    {
        $personnel->update($request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]));
        
        return redirect()->route('health.index')->with('success', 'Personnel updated successfully.');
    }

    public function destroyPersonnel(Personnel $personnel)
    {
        $personnel->delete();
        return redirect()->route('health.index')->with('success', 'Personnel deleted successfully.');
    }
}

