<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
          $instructorId = $this->route('instructor');
        return [
             'first_name' => 'nullable|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => "required|email|max:255|unique:users,email,{$instructorId}",
            'password'   => $instructorId ? 'nullable|min:6' : 'required|min:6',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'phone'      => 'nullable|string|max:20',
            'gender'     => 'nullable|in:male,female,other',
            'status'     => 'nullable|in:0,1',
            'bio'        => 'nullable|string',
            'exprience'  => 'nullable|string',
            'city'       => 'nullable|string',
            'country'    => 'nullable|string',
            'day'        => 'nullable|string',
            'month'      => 'nullable|string',
            'year'       => 'nullable|string',
        ];
    }
}