<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $courseId = $this->route('course');

        return [
            'category_id' => 'required|integer|exists:categories,id', // ត្រូវបំពេញ, integer, មានក្នុង categories
            'subcategory_id' => 'required|integer|exists:sub_categories,id', // ត្រូវបំពេញ, integer, មានក្នុង sub_categories
            'instructor_id' => 'required|integer|exists:users,id', // ត្រូវបំពេញ, instructor stored in users
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // អាចទទេ, រូប ≤ 2MB
            'course_title' => 'required|string', // ត្រូវបំពេញ, string
            'course_name' => 'required|string', // ត្រូវបំពេញ, string
            'course_name_slug' => "nullable|string|max:255|unique:courses,course_name_slug,{$courseId}", // អាចទទេ, មិនឆ្លង table លើកលែង record update
            'description' => 'required|string', // ត្រូវបំពេញ, string
            'video_url' => 'nullable|url', // អាចទទេ, ត្រូវជា URL ប្រសិនបើបញ្ចូល
            'label' => 'nullable|string|max:100', // អាចទទេ, string ≤ 100
            'resources' => 'nullable|string|max:250', // អាចទទេ, string ≤ 250
            'certificate' => 'nullable|string|max:100', // អាចទទេ, string ≤ 100
            'discount_price' => 'required|numeric|decimal:2',
            'selling_price' => 'required|numeric|decimal:2|lte:selling_price',

            // 'selling_price' => 'required|decimal|min:0', // ត្រូវបំពេញ, integer ≥ 0
            // 'discount_price' => 'nullable|decimal|min:0|lte:selling_price', // អាចទទេ, ≤ selling price
            'prerequisites' => 'nullable|string|max:10000', // អាចទទេ, string ≤ 10000
            'bestseller' => 'nullable|in:yes,no', // អាចទទេ, តម្លៃ yes/no
            'featured' => 'nullable|in:yes,no', // អាចទទេ, តម្លៃ yes/no
            'highestrated' => 'nullable|in:yes,no', // អាចទទេ, តម្លៃ yes/no
            'course_goals.*' => 'nullable', // អាចទទេ, array items optional
        ];

    }
}