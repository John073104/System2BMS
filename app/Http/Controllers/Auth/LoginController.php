<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Other methods...

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Redirect to the home page or login page
    }
}
