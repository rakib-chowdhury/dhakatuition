<?php

namespace App\Http\Controllers\TutorController;

use App\Tutor\PersonalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\PersonalInfoValidator;
use Illuminate\Support\Facades\Auth;

class PersonalInfoController extends Controller
{
    protected function store(PersonalInfoValidator $request)
    {
        $personalInfo = PersonalInfo::create([
            'user_id' => Auth::user()->id,
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('maritalStatus'),
            'country' => $request->input('tutorCountry'),
            'division' => $request->input('tutorDivision'),
            'district' => $request->input('tutorDistrict'),
            'upazila' => $request->input('tutorLocation'),
            'location' => $request->input('location'),
            'zip_code' => $request->input('zipCode'),
            'id_card_type' => $request->input('identityCardType'),
            'id_card_number' => $request->input('identityId'),
            'fb_link' => $request->input('fbId'),
            'linkdin_link' => $request->input('linkdinId'),
            'father_name' => $request->input('fatherName'),
            'father_phone' => $request->input('fatherContact'),
            'mother_name' => $request->input('MotherName'),
            'mother_phone' => $request->input('MotherContact'),
            'emergency_contact_name' => $request->input('relativeName'),
            'emergency_contact_relation' => $request->input('relation'),
            'emergency_contact_phone' => $request->input('relativeContact'),
        ]);
        if ($personalInfo) return back()->with('success','personal info store successfully');
        return back()->with('warning','personal info store failed');
    }
    protected function update(PersonalInfoValidator $request)
    {
        $personalInfo = PersonalInfo::where('user_id', Auth::user()->id)->update([
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('maritalStatus'),
            'country' => $request->input('tutorCountry'),
            'division' => $request->input('tutorDivision'),
            'district' => $request->input('tutorDistrict'),
            'upazila' => $request->input('tutorLocation'),
            'location' => $request->input('location'),
            'zip_code' => $request->input('zipCode'),
            'id_card_type' => $request->input('identityCardType'),
            'id_card_number' => $request->input('identityId'),
            'fb_link' => $request->input('fbId'),
            'linkdin_link' => $request->input('linkdinId'),
            'father_name' => $request->input('fatherName'),
            'father_phone' => $request->input('fatherContact'),
            'mother_name' => $request->input('MotherName'),
            'mother_phone' => $request->input('MotherContact'),
            'emergency_contact_name' => $request->input('relativeName'),
            'emergency_contact_relation' => $request->input('relation'),
            'emergency_contact_phone' => $request->input('relativeContact'),
        ]);
        if ($personalInfo) return back()->with('success','personal info update successfully');
        return back()->with('warning','personal info update failed');
    }

    protected function getPersonalInfo()
    {
        $personalInfo = PersonalInfo::where('user_id', Auth::user()->id)->first();

        return response()->json($personalInfo);
    }

    protected function getPersonalInfoAdmin($id)
    {
        $personalInfo = PersonalInfo::where('user_id', $id)->first();

        return response()->json($personalInfo);
    }
}
