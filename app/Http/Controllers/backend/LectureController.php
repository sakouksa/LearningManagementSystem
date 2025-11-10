<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Services\LectureService;

class LectureController extends Controller
{
    protected $lectureService;

    public function __construct(LectureService $lectureService)
    {
        $this->lectureService = $lectureService;
    }

    // Display a listing of the resource.
    public function index()
    {
        //
    }

    // Show the form for creating a new resource.
    public function create()
    {
        //
    }

    // Store a newly created resource in storage.
    public function store(LectureRequest $request)
    {
        $validateData = $request->validated();
        $this->lectureService->createLecture($validateData);

        return back()->with('success', 'Created Lecture Successfully');
    }

    // Display the specified resource.
    public function show(string $id) {}

    // Show the form for editing the specified resource.
    public function edit($lecture)
    {
        $lecture = CourseLecture::findOrFail($lecture);

        // Fetch the course related to this lecture
        $course = CourseSection::findOrFail($lecture->course_id);

        // Pass both lecture and course to the view
        return view('backend.instructor.course-section.modal.lecture-edit-modal', compact('lecture', 'course'));
    }

    // Update the specified resource in storage.
    public function update(LectureRequest $request, $id)
    {
        // All validated data comes from LectureRequest
        $validated = $request->validated();

        $this->lectureService->updateLecture($validated, $id);

        return redirect()->back()->with('success', 'Lecture updated successfully!');

    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $lecture = CourseLecture::findOrFail($id);
        $lecture->delete();

        return redirect()->back()->with('success', 'Lecture Deleted Successfully');
    }
}
