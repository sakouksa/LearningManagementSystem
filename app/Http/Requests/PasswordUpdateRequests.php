<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\String\TruncateMode;

class PasswordUpdateRequests extends FormRequest
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
            'current_password' => 'required|string',     // ត្រូវបំពេញ, តម្លៃជា string
            'new_password' => 'required|string|min:8|confirmed', // confirmed → ត្រួតពិនិត្យថា មាន field new_password_confirmation និងតម្លៃដូច new_password
        ];
    }
}