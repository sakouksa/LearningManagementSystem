<?php

namespace App\Services;

use App\Repositories\LectureRepository; // Include the CategoryRepository

class LectureService
{
    protected $lectureRepository;

    public function __construct(LectureRepository $LectureRepository)
    {
        $this->lectureRepository = $LectureRepository;
    }

    public function createLecture(array $data)
    {
        return $this->lectureRepository->createLecture($data);
    }

    public function updateLecture(array $data, $id)
    {
        return $this->lectureRepository->updateLecture($data, $id);
    }
}
