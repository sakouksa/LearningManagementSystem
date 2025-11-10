<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseGoal;
use App\Models\SubCategory;
use App\Services\CourseService; //include courseServiecs
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //Course service instance
    protected $CourseService;

    public function __construct(CourseService $courseService)
    {
        $this->CourseService = $courseService;
    }

    // Display a listing of the resource.
    public function index()
    {
        $instructor_id = Auth::user()->id;
        $all_courses = Course::where('instructor_id', $instructor_id)->with('category', 'subcategory')->latest()->get();

        return view('backend.instructor.course.index', compact('all_courses'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $all_categories = Category::all();
        $all_subcategories = SubCategory::all();

        return view('backend.instructor.course.create', compact('all_categories', 'all_subcategories'));
    }

    // Store a newly created resource in storage.
    public function store(CourseRequest $request)
    {
        $validateData = $request->validated();
        // Pass data and fial the service
        $course = $this->CourseService->createCourse($validateData, $request->file('course_image'));
        // manage course goals
        if (! empty($validateData['course_goals'])) {
            $this->CourseService->createCourseGoals($course->id, $validateData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course Created Successfully');
    }

    public function show(Course $course) // implicit route-model binding
    {
        // $course is automatically loaded based on {course} in URL
        $course->load('category', 'subcategory', 'sections.lecture');

        return view('backend.instructor.course.show', compact('course'));
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $all_categories = Category::all();
        $course = Course::with('subcategory')->find($id);
        $course_goals = CourseGoal::where('course_id', $id)->get();

        return view('backend.instructor.course.edit', compact('all_categories', 'course', 'course_goals'));
    }

    //  Update the specified resource in storage.
    public function update(CourseRequest $request, string $id)
    {
        $validateData = $request->validated();
        $course = $this->CourseService->updateCourse($validateData, $request->file('course_image'), $id);

        // manage course goals
        if (! empty($validateData['course_goals'])) {
            $this->CourseService->updateCourseGoals($course->id, $validateData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course Updated Successfully');

    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        // delete associated image if exists
        if ($course->course_image) {
            $imagePath = public_path(parse_url($course->course_image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // delete category from database
        $course->delete();

        return redirect()->route('instructor.course.index')->with('success', 'Course Deleted Successfully');
    }
}