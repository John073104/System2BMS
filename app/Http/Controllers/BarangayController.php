<?php
namespace App\Http\Controllers;

use App\Models\Barangay;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    protected $table = 'barangay_officials';
    public function index()
    {
        $barangays = Barangay::all(); // Fetch all barangays
        $barangayOfficialsCount = Barangay::count(); // Count all barangay officials
        return view('barangays.index', compact('barangays', 'barangayOfficialsCount')); // Pass variables to the view
    }
    
    

    public function create()
    {
        return view('barangays.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'contact' => 'required|digits:11', // Ensure contact is exactly 11 digits
        'area' => 'required|string|max:255',
    ]);

    try {
        Barangay::create($validatedData);
        return redirect()->route('barangays.index')->with('success', 'Barangay created successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


    public function show(Barangay $barangay)
    {
        return view('barangays.show', compact('barangay'));
    }

    public function edit(Barangay $barangay)
    {
        return view('barangays.edit', compact('barangay'));
    }

    public function update(Request $request, Barangay $barangay)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'contact' => 'required|digits:11', // Ensure contact is exactly 11 digits
        'area' => 'required|string|max:255',
    ]);

        $barangay->update($request->all());
        return redirect()->route('barangays.index')->with('success', 'Barangay updated successfully.');
    }

    public function destroy(Barangay $barangay)
    {
        $barangay->delete();
        return redirect()->route('barangays.index')->with('success', 'Barangay deleted successfully.');
    }

    public function officials()
    {
        // Fetch all barangays from the database
        $barangays = Barangay::all(); // Adjust this if you have specific query logic

        // Pass the barangays variable to the view
        return view('barangays.officials', compact('barangays'));
    }

}