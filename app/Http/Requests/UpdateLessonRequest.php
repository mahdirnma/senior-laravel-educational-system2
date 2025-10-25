<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLessonRequest extends FormRequest
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
        if (Auth::guard('admin')->check()){
            return [
                'title'=>'required|string',
                'description'=>'required|string',
                'course_id'=>'required|exists:courses,id',
                'capacity'=>'required|integer',
                'field_id'=>'required|exists:fields,id',
                'teacher_id'=>'required|exists:teachers,id',
            ];
        }
        return [
            'title'=>'required|string',
            'description'=>'required|string',
            'course_id'=>'required|exists:courses,id',
            'capacity'=>'required|integer'
        ];
    }
}
