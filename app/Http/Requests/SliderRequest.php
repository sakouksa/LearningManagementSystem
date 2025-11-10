<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $slider = $this->route('slider'); // Model injected

        return [
            'title' => 'required|string|max:1000',  // ត្រូវបំពេញ, string ≤ 1000
            'short_description' => 'required|string|max:3000', // ត្រូវបំពេញ, string ≤ 3000
            'video_url' => 'required|url',    // ត្រូវបំពេញ, តម្លៃត្រឹមត្រូវជា URL
            'image' => $slider ? 'nullable|image' : 'required|image',
            // ប្រសិនបើ update (slider មាន), អាចទទេ, ត្រូវជា image
            // ប្រសិនបើ create, ត្រូវបំពេញ image
        ];
    }
}
