<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Services\SliderService;

class SliderController extends Controller
{
    // Protected Slider service
    protected $SliderService;

    public function __construct(SliderService $SliderService)
    {
        $this->SliderService = $SliderService;
    }

    
    // Display a listing of the resource.
    public function index()
    {
        $all_sliders = Slider::latest()->get();

        return view('backend.admin.slider.index', compact('all_sliders'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('backend.admin.slider.create');
    }

    // Store a newly created resource in storage.
    public function store(SliderRequest $request)
    {
        $this->SliderService->saveSlider($request->validated(), $request->file('image'));

        return redirect()->back()->with('success', 'Slider Create Successfully');
    }

    
    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $slider = Slider::find($id);

        return view('backend.admin.slider.edit', compact('slider'));
    }

    // Update the specified resource in storage.
    public function update(SliderRequest $request, string $id)
    {
        $this->SliderService->updateSlider($request->validated(), $request->file('image'), $id);

        return redirect()->back()->with('success', 'Slider Update Successfully');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        // delete associated image if exists
        if ($slider->image) {
            $imagePath = public_path(parse_url($slider->image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // delete slider from database
        $slider->delete();

        return redirect()->back()->with('success', 'Slider Deleted Successfully');
    }
}
