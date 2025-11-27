<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use App\Models\User;
use App\Services\AdminInstructorService;
use Illuminate\Http\Request;

class AdminInstructorController extends Controller
{
    // Instructor service instance
    protected $instructorService;

    public function __construct(AdminInstructorService $instructorService)
    {
        $this->instructorService = $instructorService;
    }

    // List all instructors
    public function index()
    {
        $all_instructors = User::where('role', 'instructor')->latest()->get();

        return view('backend.admin.instructor.index', compact('all_instructors'));
    }

    // Show form to create instructor
    public function create()
    {
        return view('backend.admin.instructor.create');
    }

    // Store new instructor
    public function store(InstructorRequest $request)
    {
        $data = $request->validated();

        // Upload photo
        $photo = $request->file('photo');
        $this->instructorService->saveInstructor($data, $photo);

        return redirect()->back()->with('success', 'Instructor Created Successfully');
    }

    // Show form to edit instructor
    public function edit($id)
    {
        $instructor = User::findOrFail($id);

        return view('backend.admin.instructor.edit', compact('instructor'));
    }

    // Update instructor
    public function update(InstructorRequest $request, $id)
    {
        $data = $request->validated();
        $photo = $request->file('photo');
        $this->instructorService->updateInstructor($data, $photo, $id);

        return redirect()->back()->with('success', 'Instructor Updated Successfully');
    }

    // Delete instructor
    public function destroy($id)
    {
        $instructor = User::findOrFail($id);

        if ($instructor->photo) {
            $imagePath = public_path(parse_url($instructor->photo, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $instructor->delete();

        return redirect()->back()->with('success', 'Instructor Deleted Successfully');
    }

    // Update instructor status
    public function updateStatus(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user) {
            $user->status = $request->status;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User status updated successfully!',
            ]);
        }

        // User not found
        return response()->json([
            'success' => false,
            'message' => 'User not found.',
        ]);
    }

    // List active instructors
    public function instructorActive(Request $request)
    {
        $active_instructors = User::where('status', '1')->where('role', 'instructor')->latest()->get();

        return view('backend.admin.instructor.active', compact('active_instructors'));
    }
}
