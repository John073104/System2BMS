<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use App\Models\BarangayOfficial;
use App\Models\Resident; 
use App\Models\Official;
// Adjust Resident model if necessary

class ReportController extends Controller
{
    public function index()
    {
        // Fetch data for residents and barangay officials
        $residents = Resident::all(); // Adjust Resident model if necessary
        $officials = BarangayOfficial::all(); // Adjust BarangayOfficial model if necessary
    
        // Pass the data to the view
        return view('reports.index', compact('residents', 'officials'));
    }
    
   

    public function showReports()
    {
        // Fetch residents, clearances, and officials
        $residents = Resident::all();  // This fetches all residents
        $clearances = Clearance::all();  // This fetches all clearances
        $officials = Official::all();  // This fetches all officials

        // Pass data to the view
        return view('reports.index', compact('residents', 'clearances', 'officials'));
    }
    
}
