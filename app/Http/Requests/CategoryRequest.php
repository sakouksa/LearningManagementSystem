<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('category');

        return [
            'name' => 'required|string|max:255', // ត្រូវបំពេញ អក្សរ ≤ 255
            'slug' => "required|string|max:255|unique:categories,slug,{$categoryId}", // ត្រូវបំពេញ មិនឆ្លងក្នុង table លើកលែង record នេះ
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // អាចទទេ រូបភាព ≤ 2MB
        ];

    }
}
