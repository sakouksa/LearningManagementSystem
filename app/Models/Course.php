<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// <-- Import with correct case

class Course extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'instructor_id', 'id');
    }

    public function course_goal()
    {
        return $this->hasMany(CourseGoal::class, 'course_id', 'id');
    }
    public function sections()
{
    return $this->hasMany(CourseSection::class, 'course_id', 'id');
}

}