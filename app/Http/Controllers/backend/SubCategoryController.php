<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategoryService;

class SubCategoryController extends Controller
{
    // Protected SubCategory service
    protected $subCategoryService;

    public function __construct(SubCategoryService $subcategoryService)
    {
        $this->subCategoryService = $subcategoryService;
    }

    public function index()
    {
        $all_subcategories = SubCategory::with('category')->orderBy('created_at', 'desc') ->get();
        return view('backend.admin.subcategory.index', compact('all_subcategories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $all_categories = Category::orderby('name', 'asc')->get();

        return view('backend.admin.subcategory.create', compact('all_categories'));
    }

    // Store a newly created resource in storage.
    public function store(SubcategoryRequest $request)
    {
        // Pass data and files to the serviecs
        $this->subCategoryService->SaveSubCategory($request->validated());

        return redirect()->back()->with('success', 'New SubCategory Insert');
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $all_categories = Category::orderBy('name', 'asc')->get();

        return view('backend.admin.subcategory.edit', compact('subcategory', 'all_categories'));

    }

    // Update the specified resource in storage.
    public function update(SubcategoryRequest $request, string $id)
    {
        $this->subCategoryService->updateSubCategory($request->validated(), $id);

        return redirect()->back()->with('success', 'Updated SubCategory Successfully');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->back()->with('success', 'SubCategory Deleted Successfully');
    }
}
