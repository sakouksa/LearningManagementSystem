<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequests;
use App\Http\Requests\ProfileRequest;
use App\Models\wishlist;
use App\Services\PasswordUpdateService;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    protected $profileService;

    protected $PasswordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $PasswordUpdateService)
    {
        $this->profileService = $profileService;
        $this->PasswordUpdateService = $PasswordUpdateService;
    }

    public function index()
    {
        $user_id = Auth::id();

        $wishlist = wishlist::where('user_id', $user_id)
            ->with('course', 'course.user')
            ->get();

        return view('backend.user.profile.index' , compact('wishlist'));
    }

    public function store(ProfileRequest $request)
    {
        // pass data and to the service
        $this->profileService->saveprofile($request->validated(), $request->file('photo'));

        return redirect()->back()->with('success', 'Profile update success');
    }

    // Update password
    public function passwordSetting(PasswordUpdateRequests $request)
    {
        // pass data and to the service
        $this->PasswordUpdateService->updatePassword($request->validated());

        return redirect()->back()->with('success', 'Password update success');
    }
}