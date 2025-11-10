<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;

class AdminInstructorRepository
{
    use FileUploadTrait;

    public function saveInstructor($data, $photo)
    {
        if ($photo) {
            $data['photo'] = $this->uploadFile($photo, 'user');
        }
        $data['name'] = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'instructor';
        $data['status'] = $data['status'] ?? 1;

        return User::create($data);
    }

    public function updateInstructor($data, $photo, $id)
    {
        $instructor = User::find($id);

        if ($photo) {
            $data['photo'] = $this->uploadFile($photo, 'user', $instructor->photo ?? null);
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['name'] = trim(($data['first_name'] ?? $instructor->first_name) . ' ' . ($data['last_name'] ?? $instructor->last_name));

        $instructor->update($data);

        return $instructor;
    }
}