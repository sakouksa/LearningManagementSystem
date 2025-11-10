<?php

namespace App\Repositories;

use App\Models\CourseLecture;

class LectureRepository
{
    /**
     * Create a new lecture
     */
    public function createLecture($data)
    {
        return CourseLecture::create($data);
    }

    /**
     * Update an existing lecture
     */
    public function updateLecture($data, $id)
    {
        $lecture = CourseLecture::findOrFail($id);
        $lecture->update($data);
        return $lecture;
    }

}