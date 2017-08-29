<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferValidation extends FormRequest
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
            'title'     => 'required | max:100',
            'firstName' => 'required | max:100',
            'lastName'  => 'required | max:100',
            'phone'     => 'required | max:20',
            'relation'  => 'required | max:50',
            'email'     => 'email',
            'medium'    => 'required',
            'Class'     => 'required',
            'Subject'   => 'required',
            'gender'    => 'required',
            'salary'    => 'required',
            'negotiable'=> 'boolean',
            'days'      => 'required',
            'country'   => 'required',
            'division'  => 'required',
            'district'  => 'required',
            'location'  => 'required',
            'studentAmount'    => 'required | integer',
            'speceficLocaiotn' => 'required',
            'offerRequirement' => 'required',
        ];
    }
}
