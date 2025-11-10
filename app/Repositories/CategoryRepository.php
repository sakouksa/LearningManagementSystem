<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\FileUploadTrait; // import the FileUploadTrait

class CategoryRepository
{
    use FileUploadTrait;

    public function SaveCategory($data, $image)
    {
        $Category = new Category();
        if ($image) {
            $data['image'] = $this->uploadFile($image, 'category', $Category->image ?? null);
        }
        $Category->create($data);
        return $Category;
    }
    public function updateCategory($data, $image,$id)
    {
        $Category = Category::find($id);
        if ($image) {
            $data['image'] = $this->uploadFile($image, 'category', $Category->image ?? null);
        }
        $Category->update($data);
        return $Category;
    }
}
