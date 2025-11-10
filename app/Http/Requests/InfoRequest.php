<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'icon' => [
                'required', // ត្រូវបំពេញ
                'string',   // តម្លៃត្រូវជា string
                'max:1000', // អក្សរមិនលើស 1000
                function ($attribute, $value, $fail) {
                    if (! str_starts_with($value, '<svg')) {
                        $fail('The '.$attribute.' must be a valid SVG code.');
                        // តម្លៃត្រូវចាប់ផ្តើមជាភាគល្អ <svg>
                    }
                },
            ],
            'title' => 'required|string|max:255', // ត្រូវបំពេញ, string ≤ 255
            'description' => 'required|string|max:1000', // ត្រូវបំពេញ, string ≤ 1000
        ];
    }
}
