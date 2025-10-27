<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCourseRequest extends FormRequest
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
        if (Auth::guard('teachers')->check()) {
            return [
                'title' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'year' => 'required',
            ];
        }
        return [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'year' => 'required',
            'teacher_id' => 'required',
        ];
    }
}
