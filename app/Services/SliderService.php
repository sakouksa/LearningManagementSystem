<?php

namespace App\Services;

use App\Repositories\SliderRepository;//Include the CategoryRepository

class SliderService
{
    protected $SliderRepository;

    public function __construct(SliderRepository $SliderRepository)
    {
        $this->SliderRepository = $SliderRepository;
    }

    public function saveSlider(array $data, $image = null)
    {
        return $this->SliderRepository->saveSlider($data, $image);
    }
        public function updateSlider(array $data, $image = null,$id)
    {
        return $this->SliderRepository->updateSlider($data, $image,$id);
    }
}
