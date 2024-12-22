<?php

namespace App\Http\Controllers;

use App\Models\Request; // Adjust the model name if different
use Illuminate\Http\Request as HttpRequest;

class UserRequestController extends Controller
{
    public function index()
    {
        // Fetch requests submitted by the logged-in user
        $requests = Request::where('user_id', auth()->id())->get();

        return view('user.health.index', compact('requests'));
    }

    public function create()
    {
        return view('user.requests.create'); // Form for creating a new request
    }

    public function store(HttpRequest $request)
    {
        // Validate the request
        $data = $request->validate([
            'type' => 'required|string',
            'details' => 'required|string',
        ]);

        // Save the request in the database
        Request::create([
            'user_id' => auth()->id(),
            'type' => $data['type'],
            'details' => $data['details'],
            'status' => 'Pending',
        ]);

        return redirect()->route('user.requests.index')->with('success', 'Request submitted successfully.');
    }
}

