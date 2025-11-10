<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // ត្រូវបំពេញ, string ≤ 255

            'email' => [
                'required',    // ត្រូវបំពេញ
                'string',      // តម្លៃជាផ្សំអក្សរ
                'lowercase',   // តម្លៃត្រូវជា lowercase
                'email',       // តម្លៃត្រឹមត្រូវជា email
                'max:255',     // អក្សរមិនលើស 255
                Rule::unique(User::class)->ignore($this->user()->id),
                // មិនឆ្លងក្នុង table users លើកលែង user update
            ],
        ];

    }
}
