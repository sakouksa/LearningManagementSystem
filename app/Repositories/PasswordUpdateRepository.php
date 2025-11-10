<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUploadTrait; // import the FileUploadTrait

class PasswordUpdateRepository
{
    // use FileUploadTrait;

    public function updatePassword($data)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        //Check if the current password is current
        if (!Hash::check($data['current_password'], $user->password)) {
            // The passwords do not match, so return an error or throw an exception.
            return back()->withErrors(['current_password' => 'Incorrect password.']);
        }
        // Update the password
        $user->password = Hash::make($data['new_password']);
        $user-> save();
        // dd($user->password);
        return $user;
    }
}
