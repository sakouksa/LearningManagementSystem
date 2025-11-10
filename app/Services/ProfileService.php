<?php

namespace App\Services;

use App\Repositories\ProfileRepository; // Include the ProfileRepository

class ProfileService
{
    protected $ProfileRepository;

    public function __construct(ProfileRepository $ProfileRepository)
    {
        $this->ProfileRepository = $ProfileRepository;
    }

    public function saveprofile(array $data, $photo = null)
    {
        return $this->ProfileRepository->createOrUpdateProfile($data, $photo);
    }
}
