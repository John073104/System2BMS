<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClearanceStatusUpdated;

class ClearanceController extends Controller
{
   
public function index()
{
    $clearances = Clearance::all();
    return view('clearances.index', compact('clearances'));
}

public function store(Request $request)
{
    // Validate the data
    $request->validate([
        'name' => 'required|string|max:255',
        'purpose' => 'required|string|max:255',
        'status' => 'required|string|in:pending,approved,rejected',
    ]);

    // Create the clearance request
    Clearance::create([
        'name' => $request->name,
        'purpose' => $request->purpose,
        'status' => 'pending', // Set default status as 'pending'
        'release_date' => null, // You can leave the release date null initially
    ]);

    // Redirect back with success message
    return redirect()->route('clearances.index')->with('success', 'Clearance request added successfully!');
}
   
    public function updateStatus(Request $request, $id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->status = $request->input('status');
        $clearance->save();
    
        // Check if the clearance has a user before attempting to send an email
        if ($clearance->user) {
            Mail::to($clearance->user->email)->send(new ClearanceStatusUpdated($clearance));
        } else {
            // Log a warning or handle the error if the user is not found
            \Log::warning("No user found for clearance ID: {$clearance->id}");
        }
    
        return redirect()->route('clearances.index')->with('success', 'Clearance status updated successfully.');
    }
    

    public function updateReleaseDate(Request $request, $id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->release_date = $request->input('release_date');
        $clearance->status = 'released'; // Automatically set status to 'released'
        $clearance->save();

        return redirect()->route('clearances.index')->with('success', 'Release date set successfully.');
    }
}
