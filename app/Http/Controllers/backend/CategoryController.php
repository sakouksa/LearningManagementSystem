<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\CategoryService; // Include CategoryServiecs

class CategoryController extends Controller
{
    // Category service instance
    protected $CategoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->CategoryService = $categoryService;
    }

    // Category view Category
    public function index()
    {
        $all_categories = Category::latest()->get();

        return view('backend.admin.category.index', compact('all_categories'));
    }

    // Show the form for creating a new resource.

    public function create()
    {
        return view('backend.admin.category.create');
    }

    // Store a newly created resource in storage.
    public function store(CategoryRequest $request)
    {
        // Pass data and files to the serviecs
        $this->CategoryService->SaveCategory($request->validated(), $request->file('image'));

        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('backend.admin.category.edit', compact('category'));
    }

    // Update the specified resource in storage.

    public function update(CategoryRequest $request, string $id)
    {

        // Pass data and files to the serviecs
        $this->CategoryService->updateCategory($request->validated(), $request->file('image'), $id);

        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // delete associated image if exists
        if ($category->image) {
            $imagePath = public_path(parse_url($category->image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // delete category from database
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
    //get getSubCategories id
    public function getSubCategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->get();

        return response()->json($subcategories);
    }
}