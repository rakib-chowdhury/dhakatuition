<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoValidator extends FormRequest
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
        $infoRolls = [
            // academic input field
            'mediumId'   => 'required',
            'classId'    => 'required',
            'subjectId'  => 'required',
            // location input field
            'country'    => 'required',
            'division'   => 'required',
            'district'   => 'required',
            'location'   => 'required',
            'preferredLocation' => 'required',
            // tutoring type field
            'studentHome'=> 'boolean',
            'yourHome'   => 'boolean',
            'online'     => 'boolean',
            // ability input field
            'tutoringDay' => 'required',
            'availableTo' => 'required',
            'salary'      => 'required',
            'negotiable'  => 'boolean',
            'contactNo'   => 'required',
            'experience'  => 'required | boolean',
            'availableFrom'   => 'required',
            // tutoring style input field
            'groupTutoring'   => 'boolean',
            'personalTutoring'=> 'boolean',
        ];

        if ($this->request->get('experience') == 1)
        {
            $infoRolls['experienceYear'] = 'required';
            $infoRolls['experienceDetail'] = 'required | max:255';
        }

        if ($this->request->get('online') == 1)
        {
            $infoRolls['skypeId'] = 'required';
            $infoRolls['googleId'] = 'required';
        }

        if ($this->request->get('experience') == 1)
        {
            $infoRolls['experienceYear']   = 'required';
            $infoRolls['experienceDetail'] = 'required';
        }

        return $infoRolls;
    }
}
