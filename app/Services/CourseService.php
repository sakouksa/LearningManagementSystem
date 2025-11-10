<?php

namespace App\Services;

use App\Repositories\CourseRepository; // Include the CategoryRepository

class CourseService
{
    protected $CourseRepository;

    public function __construct(CourseRepository $CourseRepository)
    {
        $this->CourseRepository = $CourseRepository;
    }

    public function createCourse(array $data, $photo = null)
    {
        return $this->CourseRepository->createCourse($data, $photo);
    }

    public function updateCourse(array $data, $photo, $id)
    {
        return $this->CourseRepository->updateCourse($data, $photo, $id);
    }

    public function createCourseGoals($courseId, array $goals)
    {
        return $this->CourseRepository->createCourseGoals($courseId, $goals);
    }

    // Update CourseGoals
    public function updateCourseGoals($courseId, array $goals)
    {
        return $this->CourseRepository->updateCourseGoals($courseId, $goals);
    }
}
