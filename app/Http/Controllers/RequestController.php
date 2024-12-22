<?php

// app/Http/Controllers/RequestController.php
namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Medicine;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestStatusMail; // Ensure this line is present

class RequestController extends Controller
{
    // ... existing methods

    public function approve(HttpRequest $request, $id)
    {
        $requestToApprove = Request::findOrFail($id);
        $requestToApprove->status = 'approved';
        $requestToApprove->release_date = $request->release_date;
        $requestToApprove->save();

        $medicine = Medicine::findOrFail($requestToApprove->medicine_id);
        $medicine->quantity -= 1; // Adjust quantity as needed
        $medicine->save();

        // Send email notification
        Mail::to($requestToApprove->user->email)->send(new RequestStatusMail($requestToApprove));

        return redirect()->route('admin.requests.index')->with('success', 'Request approved successfully.');
    }

    public function reject($id)
    {
        $requestToReject = Request::findOrFail($id);
        $requestToReject->status = 'rejected';
        $requestToReject->save();

        // Send email notification
        Mail::to($requestToReject->user->email)->send(new RequestStatusMail($requestToReject));

        return redirect()->route('admin.requests.index')->with('success', 'Request rejected successfully.');
    }
}