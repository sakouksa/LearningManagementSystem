<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstuctorController extends Controller
{
    // Show the instructor login form
    public function login()
    {
        return view('backend.instructor.login.index');
    }
    // Show the instructor dashboard
    public function dashboard()
    {
        return view('backend.instructor.dasboard.index');
    }

    // Destroy an authenticated session.
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instructor/login');
    }
}
