<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user_id = Auth::id();

        $wishlist = wishlist::where('user_id', $user_id)
            ->with('course', 'course.user')
            ->get();

        return view('backend.user.index', compact('wishlist'));
    }

    //  Destroy an authenticated session.
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
