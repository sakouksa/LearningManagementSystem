<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\CourseGoal;
use App\Traits\FileUploadTrait; // import the FileUploadTrait

class CourseRepository
{
    use FileUploadTrait;

    public function createCourse($data, $photo)
    {
        $Course = new Course;
        // remove Course Goals form the data
        unset($data['course_goals']);
        // Handle file upload
        if ($photo) {
            $data['course_image'] = $this->uploadFile($photo, 'course', $Course->course_image ?? null);
        }

        return Course::create($data);
    }

    public function updateCourse($data, $photo, $id)
    {
        $Course = Course::find($id);
        // remove Course Goals form the data
        unset($data['course_goals']);

        if ($photo) {
            $data['course_image'] = $this->uploadFile($photo, 'course', $Course->course_image ?? null);
        }
        $Course->update($data);

        return $Course->fresh();
    }

    public function createCourseGoals($courseId, array $goals)
    {

        foreach ($goals as $goal) {
            if (($goal)) {
                // Assuming you have a CourseGoal model
                CourseGoal::create([
                    'course_id' => $courseId,
                    'goal_name' => $goal,
                ]);
            }
        }
    }

    public function updateCourseGoals($courseId, array $goals)
    {
        CourseGoal::where('course_id', $courseId)->delete();
        foreach ($goals as $goal) {
            if (($goal)) {
                // Assuming you have a CourseGoal model
                CourseGoal::create([
                    'course_id' => $courseId,
                    'goal_name' => $goal,
                ]);
            }
        }
    }
}
