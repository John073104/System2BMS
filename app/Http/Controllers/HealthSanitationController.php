<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthSanitationController extends Controller
{
    public function index()
    {
        return view('user.health.index');
         // Return the Health & Sanitation view
    }
}
