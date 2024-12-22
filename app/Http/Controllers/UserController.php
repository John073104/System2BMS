<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Barangay;
use App\Models\Medicine;
use App\Models\Personnel;
use Illuminate\Http\Request as HttpRequest; // Alias the HTTP request class
use App\Models\Clearance;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Models\Request as UserRequest;// Correct import for the Request class// Adjust the namespace if your User model is in a different location
class UserController extends Controller
{
    public function index()
    {
        $requests = Auth::user()->requests; // Assuming User model has 'requests' relationship
        return view('user.requests.index', compact('requests'));
    }

    public function show()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('user.profile', compact('user')); // Pass the user to the view
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID or throw a 404 if not found
        return view('user.edit', compact('user')); // Pass the user data to the view
    }
    


    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->update($request->only('name', 'email'));
    //     return redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully.');
    // }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User  deleted successfully.');
    }
    public function dashboard()
    {
        // You can fetch user-specific data here if needed
        return view('user.dashboard'); // Ensure this view file exists
    }
    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed', // Optional password field
        ]);

        // Get the authenticated user
        $user = Auth::user(); // This should return an instance of User

        // Check if user is null
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User  not found.']);
        }

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Attempt to save the user
        try {
            $user->save(); // This should work if $user is a valid Eloquent model
            return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error saving user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to update profile.']);
        }
    }
    // UserController.php
    public function barangayOfficials()
    {
        // Fetch all barangay officials
        $barangays = Barangay::all();

        // Pass the data to the view
        return view('user.barangay.index', compact('barangays'));
    }
    public function healthSanitation()
{
    // Fetch medicines and personnel from the database
    $medicines = Medicine::all();
    $personnels = Personnel::all();

    // Fetch user-specific requests
    $requests = \App\Models\Request::where('user_id', auth()->id())->get();

    // Pass all data to the view
    return view('user.health.index', compact('medicines', 'personnels', 'requests'));
}

public function createRequest()
{
    return view('user.requests.create');
}

public function storeRequest(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'type' => 'required|string',
            'details' => 'required|string',
        ]);

        // Create a new request entry in the database
        $userRequest = new UserRequest();
        $userRequest->user_id = Auth::id(); // Assuming you have a user_id field
        $userRequest->type = $validatedData['type'];
        $userRequest->details = $validatedData['details'];
        $userRequest->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Request submitted successfully.');
    }

public function listRequests()
{
    $requests = Request::where('user_id', auth()->id())->get();
    return view('user.requests.index', compact('requests'));
}
public function userHealthRequests()
{
    $requests = \App\Models\Request::where('user_id', auth()->id())->get();

    return view('user.requests.index', compact('requests'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'purpose' => 'required|string|max:255',
        'user_email' => 'required|email',
    ]);

    Clearance::create([
        'name' => $validated['name'],
        'purpose' => $validated['purpose'],
        'user_email' => $validated['user_email'],
        'release_date' => now()->addDays(3), // Example: default release date set in the future
    ]);

    return back()->with('success', 'Clearance request submitted successfully.');
}


}