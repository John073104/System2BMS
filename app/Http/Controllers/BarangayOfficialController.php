<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangayOfficialController extends Controller
{
    public function index()
    {
        return view('user.barangay.index'); // Return the Barangay Officials view
    }
}
