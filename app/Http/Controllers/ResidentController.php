<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ResidentController extends Controller
{
    // Display a listing of the residents
    public function index()
    {
        $residents = Resident::all(); 
        $residentsCount = Resident::count();
        return view('residents.index', compact('residents'));
    }

    // Store a newly created resident in storage
    public function store(Request $request)
    {
        Log::info($request->all());

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'civil_status' => 'required|string',
            'purok' => 'required|string|max:255',
            'four_ps_beneficiary' => 'required|string|in:yes,no',
            'nationality' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
            $path = $request->file('image_upload')->store('images', 'public');
        }
        
        $validated = [];
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'purok' => 'required|string|max:255',
            'four_ps_beneficiary' => 'required|in:yes,no',
            'nationality' => 'required|string|max:255',
            'national_id' => 'required|string|max:255|unique:residents',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:residents',
            'image_upload' => 'nullable|image|max:2048',
        ]);
        
        Resident::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'place_of_birth' => $request->place_of_birth,
            'age' => $request->age,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'purok' => $request->purok,
            'four_ps_beneficiary' => $request->four_ps_beneficiary === 'yes' ? 1 : 0, // Convert to integer
            'nationality' => $request->nationality,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'email' => $request->email,
           'image' => $imageName ?? null,
        ]);
    

        return redirect()->route('residents.index')->with('success', 'Resident added successfully.');
    }

    // Display the dashboard with resident data
    public function dashboard()
    {
        $residents = Resident::all(); // Retrieve all residents
        $totalPopulation = $residents->count(); // Count total residents
        $totalMale = $residents->where('gender', 'male')->count(); // Count male residents
        $totalFemale = $residents->where('gender', 'female')->count(); // Count female residents
        $total4Ps = $residents->where('four_ps_beneficiary', true)->count(); // Count 4Ps beneficiaries
        $purokNumbers = $residents->pluck('purok')->unique()->count(); // Count unique purok numbers
    
        // Log the retrieved residents for debugging
        Log::info('Residents retrieved: ', $residents->toArray());
    
        return view('admin.dashboard', compact('residents', 'totalPopulation', 'totalMale', 'totalFemale', 'total4Ps', 'purokNumbers'));
    }

    // Show the specified resident
    public function show($id)
{
    $resident = Resident::findOrFail($id); // Retrieve the resident
    return view('residents.show', compact('resident')); // Pass the resident to the view
}

    // Show the form for editing the specified resident
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        return view('residents.edit', compact('resident'));
    }

    // Update the specified resident in storage
    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'civil_status' => 'required|string|max:255',
            'purok' => 'required|string|max:255',
            'four_ps_beneficiary' => 'required|boolean',
            'nationality' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:residents,email,' . $resident->id,
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_upload')) {
            // Delete old image if exists
            if ($resident->image_path) {
                Storage::delete('public/' . $resident->image_path);
            }
            $imagePath = $request->file('image_upload')->store('images', 'public');
        } else {
            $imagePath = $resident->image_path; // Keep the old image if no new image is uploaded
        }

        $resident->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'place_of_birth' => $request->place_of_birth,
            'age' => $request->age,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'purok' => $request->purok,
            'four_ps_beneficiary' => $request->four_ps_beneficiary === 'yes' ? 1 : 0, // Convert to integer
            'nationality' => $request->nationality,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'email' => $request->email,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Resident updated successfully.');
    }

    // Remove the specified resident from storage
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        
        // Delete the resident's image if it exists
        if ($resident->image_path) {
            Storage::delete('public/' . $resident->image_path);
        }

        $resident->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Resident deleted successfully.');
    }
}