<?php

namespace App\Http\Controllers;

use App\Models\Request; // Adjust the model name if different
use Illuminate\Http\Request as HttpRequest;

class AdminRequestController extends Controller
{
    public function index()
    {
        // Fetch all requests
        $requests = Request::all(); // Or apply filters if needed

        return view('admin.requests.index', compact('requests'));

    }

    public function approve(Request $request)
    {
        // Approve the request
        $request->update(['status' => 'Approved']);

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

    public function reject(Request $request)
    {
        // Reject the request
        $request->update(['status' => 'Rejected']);

        return redirect()->back()->with('success', 'Request rejected successfully.');
    }
}

