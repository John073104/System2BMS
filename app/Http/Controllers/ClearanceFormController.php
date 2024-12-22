<?php
namespace App\Http\Controllers;

use App\Models\ClearanceForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClearanceFormController extends Controller
{
    public function index()
    {
        // Fetch all clearance forms for the logged-in user
        $clearances = ClearanceForm::where('user_id', auth()->id())->get();
        return view('user.clearance.index', compact('clearances'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
        ]);

        // Create a new clearance record
        $clearance = new ClearanceForm();
        $clearance->name = $request->name;
        $clearance->purpose = $request->purpose;
        $clearance->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
        $clearance->status = 'pending'; // Set the initial status to pending
        $clearance->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Clearance request submitted successfully.');
    }
}
