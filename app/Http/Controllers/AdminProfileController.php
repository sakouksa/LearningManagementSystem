<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequests;
use App\Http\Requests\ProfileRequest;
use App\Services\PasswordUpdateService;
use Illuminate\Http\Request;
use App\Services\ProfileService;

class AdminProfileController extends Controller
{
    protected $profileService, $PasswordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $PasswordUpdateService)
    {
        $this->profileService = $profileService;
        $this->PasswordUpdateService = $PasswordUpdateService;
    }

    public function index()
    {
        return view('backend.admin.profile.index');
    }

    public function store(ProfileRequest $request)
    {
        //pass data and to the service
        $this->profileService->saveprofile($request->validated(), $request->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function setting()
    {
        return view('backend.admin.profile.setting');
    }
    public function passwordSetting(PasswordUpdateRequests $request)
    {
        //pass data and to the service
        $this->PasswordUpdateService->updatePassword($request->validated());
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
