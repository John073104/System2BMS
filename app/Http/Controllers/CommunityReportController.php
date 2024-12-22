<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityReportController extends Controller
{
    public function index()
    {
        return view('user.report.index'); // Return the Community Reports view
    }
}
