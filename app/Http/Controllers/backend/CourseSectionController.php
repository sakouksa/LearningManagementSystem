<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'section_title' => 'required|string|max:255',
        ]);

        CourseSection::create([
            'course_id' => $request->course_id,
            'section_title' => $request->section_title,
        ]);

        return redirect()->back()->with('success', 'Section added successfully!');
    }

    // isplay the specified resource.
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        // Fetch sections in descending order by ID
        $course_wise_lecture = CourseSection::with('lecture')->where('course_id', $id)->orderBy('id', 'desc')->get();

        return view('backend.instructor.course-section.index', compact('course', 'course_wise_lecture'));
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $section = CourseSection::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');
    }
}