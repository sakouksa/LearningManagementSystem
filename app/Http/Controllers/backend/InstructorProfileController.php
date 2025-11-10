<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequests;
use App\Http\Requests\ProfileRequest;
use App\Services\PasswordUpdateService;
use Illuminate\Http\Request;
use App\Services\ProfileService;

class InstructorProfileController extends Controller
{
    // Protected profile and password update services
    protected $profileService, $PasswordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $PasswordUpdateService)
    {
        $this->profileService = $profileService;
        $this->PasswordUpdateService = $PasswordUpdateService;
    }
    // Show instructor profile
    public function index()
    {
        return view('backend.instructor.profile.index');
    }
    // Store or update instructor profile
    public function store(ProfileRequest $request)
    {
        //pass data and to the service
        $this->profileService->saveprofile($request->validated(), $request->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    // Show instructor password setting form
    public function setting()
    {
        return view('backend.instructor.profile.setting');
    }
    // Update instructor password
    public function passwordSetting(PasswordUpdateRequests $request)
    {
        //pass data and to the service
        $this->PasswordUpdateService->updatePassword($request->validated());
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
