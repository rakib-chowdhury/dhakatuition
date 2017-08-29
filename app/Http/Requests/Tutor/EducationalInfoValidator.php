<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class EducationalInfoValidator extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'label'     => 'required | max: 100',
            'examTitle' => 'required | max:150',
            'institute' => 'required | max:150',
            'major'     => 'required | max: 100',
            'cgpa'      => 'regex:/^\d*(\.\d{2})?$/',
            'idNumber'  => 'required | max:100',
            'from'      => 'required | max:100',
            'until'     => 'required | max:100',
            'passingYear' => 'required | max:100',
            'curriculum'  => 'required | max: 100',
            'currentStudding' => 'boolean',
        ];
    }
}
