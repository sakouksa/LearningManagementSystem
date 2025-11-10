<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\InfoBox;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class FrontendDashboardController extends Controller
{
    public function home()
    {

        //All sliders infobox categories
        $all_sliders = Slider::latest()->get();
        $all_info = InfoBox::all();
        $all_categories = Category::inRandomOrder()->limit(6)->get();

        $course_category = Category::with('course', 'course.user', 'course.course_goal')->get();

        $categories = Category::all();
        // Return to the frontend home view with the data
        return view('frontend.pages.home.index', compact('all_sliders', 'all_info', 'all_categories', 'categories', 'course_category', 'course_category'));
    }

    public function view($slug)
    {
        // Get course by slug
        $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory', 'user', 'course_goal')->first();
        // Get total lectures and course content
        $total_lecture = CourseLecture::where('course_id', $course->id)->count();
        $course_content = CourseSection::where('course_id', $course->id)->with('lecture')->get();
        // Get all categories order by name asc
        $all_category = Category::orderBy('name', 'asc')->get();

        // Get curenlly authenticate user's Id
        $userId = Auth::id();
        // Find similar courses
        $similarcourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->with('user')->get();
        // Find more courses by the same instructor
        $more_courses_instructor = Course::where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->with('user')->get();
        // Calculate total duration
        $total_minutes = CourseLecture::where('course_id', $course->id)->sum('video_duration');
        $hours = floor($total_minutes / 60);
        $minutes = floor($total_minutes % 60);
        $secound = round(($total_minutes - floor($total_minutes))*60);
        $total_lecture_duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $secound);
        //course category
        $course_category = Category::with('course', 'course.user', 'course.course_goal')->get();
        // Return to the course detail view with the data
        return view('frontend.pages.course-detail.index', compact('course', 'course_content', 'total_lecture', 'similarcourses', 'more_courses_instructor', 'all_category', 'course_category','total_lecture_duration'));
    }
}