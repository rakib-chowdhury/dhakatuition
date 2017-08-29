<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoValidator extends FormRequest
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
            'gender' => 'required | max:5',
            'maritalStatus' => 'required | max:20',
            'tutorCountry' => 'required | max:50',
            'tutorDivision' => 'required | max:50',
            'tutorDistrict' => 'required | max:50',
            'tutorLocation' => 'required | max:50',
            'zipCode' => 'required | max:20',
            'location' => 'required | max:200',
            'identityCardType' => 'required | integer | max:2',
            'identityId' => 'required | max:100',
            'fbId' => 'required | max:150',
            'linkdinId' => 'max:150',
            'fatherName' => 'required | max:100',
            'fatherContact' => 'max:202',
            'MotherName' => 'required | max:100',
            'MotherContact' => 'max:20',
            'relativeName' => 'required | max:100',
            'relation' => 'required | max:50',
            'relativeContact' => 'required | max:30'
        ];
    }
}
