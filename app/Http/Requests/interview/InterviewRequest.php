<?php

namespace App\Http\Requests\interview;

use Illuminate\Foundation\Http\FormRequest;

class InterviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'job' => 'required'
        ];
    }

    public function message() : array {
        return [
            'name.required' => 'Vui lòng nhập tên Người Phỏng Vấn',
            'job.required' => 'Vui lòng nhập chức vụ Người Phỏng Vấn'
        ];
    }
}
