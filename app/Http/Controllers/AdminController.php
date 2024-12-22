<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clearance; 
use App\Models\Medicine;
use App\Models\Personnel;
use Illuminate\Http\Request as HttpRequest;
use App\Models\UserRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\ApproveRequest;  
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    public function index()
    {
        // Fetching all user requests
        $requests = UserRequest::all();
        dd($requests); // Debugging line to confirm data is fetched correctly
        return view('admin.health.index', compact('requests'));
    }
   
    public function generateReport()
    {
        $clearances = Clearance::all();
        $pdf = Pdf::loadView('admin.clearances.report', compact('clearances'));
        return $pdf->download('clearance_report.pdf');
    }
    

    public function approve(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'release_date' => 'required|date|after_or_equal:today', // Validate release_date
        ]);

        // Find the clearance record or fail
        $clearance = Clearance::findOrFail($id);

        // Ensure the user_email field is present
        if (empty($clearance->user_email)) {
            return back()->with('error', 'No email address associated with this clearance.');
        }

        // Update the clearance record
        $clearance->update([
            'status' => 'approved',
            'release_date' => $validated['release_date'],
        ]);

        // Send email notification
        $this->sendEmail(
            $clearance->user_email,
            'Clearance Approved',
            "Your clearance request has been approved. The release date is " . $validated['release_date']
        );

        // Redirect back with success message
        return back()->with('success', 'Clearance approved and user notified.');
    }

    public function reject($id)
    {
        // Find the clearance record or fail
        $clearance = Clearance::findOrFail($id);

        // Ensure the user_email field is present
        if (empty($clearance->user_email)) {
            return back()->with('error', 'No email address associated with this clearance.');
        }

        // Update the clearance record
        $clearance->update(['status' => 'rejected']);

        // Send email notification
        $this->sendEmail(
            $clearance->user_email,
            'Clearance Rejected',
            "Your clearance request has been rejected."
        );

        // Redirect back with success message
        return back()->with('success', 'Clearance rejected and user notified.');
    }

    private function sendEmail($to, $subject, $message)
    {
        try {
            \Mail::raw($message, function ($mail) use ($to, $subject) {
                $mail->to($to)->subject($subject);
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
    
    public function health()
    {
        // Use the full namespace for your Request model
        $requests = \App\Models\Request::all();
    
        // Debugging output
        ($requests);  // Display the data
    
        // Pass the data to the view
        return view('admin.health', compact('requests'));
    }
    
    
    public function showReports()
    {
        // Fetch all clearance records
        $clearances = Clearance::all();

        // Pass the clearances to the view
        return view('admin.reports', compact('clearances'));
    }
    public function manageRequests()
{
    $requests = Request::with('user')->get();
    return view('admin.requests.index', compact('requests'));
}

public function updateRequest(Request $request, $id)
{
    $requestToUpdate = Request::findOrFail($id);
    $requestToUpdate->status = $request->status;
    $requestToUpdate->save();

    return redirect()->route('admin.requests.index')->with('success', 'Request updated successfully!');
}
public function adminHealthRequests()
{
    $requests = \App\Models\Request::all();

    return view('admin.requests.index', compact('requests'));
}
public function healthSanitation()
{
    // Fetch medicines, personnel, and user requests from the database
    $medicines = Medicine::all();
    $personnels = Personnel::all();
    
    // Fetch the requests related to the logged-in user
    $requests = Request::where('user_id', auth()->id())->get();  // Make sure the user is authenticated
    
    // Pass the data to the view
  
  return view('health.index', compact('medicines', 'personnels', 'requests'));

}
public function updateStatus(Request $request, $id)
{
    $clearance = Clearance::findOrFail($id);

    // Update status and optionally set a release date
    $clearance->status = $request->input('status');
    if ($request->input('status') === 'approved') {
        // Set the release date if approved
        $clearance->release_date = now();
    }
    $clearance->save();

    return redirect()->back()->with('success', 'Clearance status updated.');
}



}