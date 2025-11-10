<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Traits\FileUploadTrait; // import the FileUploadTrait

class SliderRepository
{
    use FileUploadTrait;

    public function SaveSlider($data, $image)
    {
        $slider = new Slider();
        if ($image) {
            $data['image'] = $this->uploadFile($image, 'slider', $slider->image ?? null);
        }
        $slider->create($data);
        return $slider;
    }
    public function updateSlider($data, $image,$id)
    {
        $slider = Slider::find($id);
        if ($image) {
            $data['image'] = $this->uploadFile($image, 'slider', $slider->image ?? null);
        }
        $slider->update($data);
        return $slider;
    }
}
