<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string|max:255', // អាចទទេ, string ≤ 255
            'last_name' => 'nullable|string|max:255', // អាចទទេ, string ≤ 255
            'name' => 'required|string|max:255', // អាចទទេ, string ≤ 255
            'email' => 'required|email|unique:users,email,'.$this->user()->id, // ត្រូវបំពេញ, តម្លៃជា email, មិនឆ្លងក្នុង users លើកលែង user ដើម្បី update
            'phone' => 'nullable|string|max:20', // អាចទទេ, string ≤ 20
            'address' => 'required|string|max:255', // អាចទទេ, string ≤ 255
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // អាចទទេ, រូប ≤ 2MB
            'bio' => 'nullable|string|max:1000', // អាចទទេ, string ≤ 1000
            'city' => 'nullable|string|max:100', // អាចទទេ, string ≤ 100
            'country' => 'nullable|string|max:100', // អាចទទេ, string ≤ 100
            'gender' => 'nullable|string|max:10', // អាចទទេ, string ≤ 10
            'exprience' => 'nullable|string|max:255', // អាចទទេ, string ≤ 255

        ];
    }
}
