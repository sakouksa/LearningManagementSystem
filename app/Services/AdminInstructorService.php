<?php

namespace App\Services;

use App\Repositories\AdminInstructorRepository;

class AdminInstructorService
{
    protected $instructorRepository;

    public function __construct(AdminInstructorRepository $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    public function saveInstructor(array $data, $photo = null)
    {
        return $this->instructorRepository->saveInstructor($data, $photo);
    }

    public function updateInstructor(array $data, $photo = null, $id)
    {
        return $this->instructorRepository->updateInstructor($data, $photo, $id);
    }
}