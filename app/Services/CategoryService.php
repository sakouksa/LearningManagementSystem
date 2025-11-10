<?php

namespace App\Services;

use App\Repositories\CategoryRepository;//Include the CategoryRepository

class CategoryService
{
    protected $CategoryRepository;


    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    public function saveCategory(array $data, $image = null)
    {
        return $this->CategoryRepository->SaveCategory($data, $image);
    }
        public function updateCategory(array $data, $image = null,$id)
    {
        return $this->CategoryRepository->updateCategory($data, $image,$id);
    }
}
