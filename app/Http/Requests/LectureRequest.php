<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
        return [
            'course_id' => 'required|exists:courses,id', // ត្រូវបំពេញ និងមានក្នុង table courses
            'section_id' => 'required|exists:course_sections,id', // ត្រូវបំពេញ និងមានក្នុង table course_sections
            'lecture_title' => 'required|string|max:255', // ត្រូវបំពេញ អក្សរមិនលើស 255
            'url' => 'nullable|url|max:255', // អាចទទេ ត្រូវជា URL ប្រសិនបើបញ្ចូល
            'content' => 'required|string', // ត្រូវបំពេញ អក្សរ
            'video_duration' => 'nullable|numeric|min:0', // អាចទទេ ត្រូវជា number ប៉ុន្មាននាទី
        ];

    }
}