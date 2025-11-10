<?php

namespace App\Services;

use App\Repositories\SubCategoryRepository; //Include the SubcateCategoryRepository

class SubCategoryService
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }
    //Save Subcategory
    public function SaveSubCategory(array $data)
    {
        return $this->subCategoryRepository->SaveSubCategory($data);
    }
    // Update SaveSubCategory
        public function updateSubCategory(array $data,$id)
    {
        return $this->subCategoryRepository->updateSubCategory($data,$id);
    }
}
