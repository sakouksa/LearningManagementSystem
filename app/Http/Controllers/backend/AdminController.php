<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin Login View
    public function login()
    {
        return view('backend.admin.login.index');
    }
    // Admin Dashboard View
    public function dashboard()
    {
        return view('backend.admin.dasboard.index'); 
    }
    //  Destroy an authenticated session.
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}