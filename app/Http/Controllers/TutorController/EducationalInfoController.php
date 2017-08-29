<?php

namespace App\Http\Controllers\TutorController;

use App\Http\Requests\Tutor\EducationalInfoValidator;
use App\Tutor\EducationalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EducationalInfoController extends Controller
{
    protected function store(EducationalInfoValidator $request)
    {
        ($request->input('currentStudding') == null) ? $currently = 0:$currently=$request->input('currentStudding');
        $education = EducationalInfo::create([
            'user_id' => Auth::user()->id,
            'label' => $request->input('label'),
            'major' => $request->input('major'),
            'curriculum' => $request->input('curriculum'),
            'exam_title' => $request->input('examTitle'),
            'institute' => $request->input('institute'),
            'id_card' => $request->input('idNumber'),
            'cGpa' => $request->input('cgpa'),
            'from' => $request->input('from'),
            'until' => $request->input('until'),
            'passed' => $request->input('passingYear'),
            'currently_studding' => $currently,
        ]);
        if ($education)
        {
            return redirect('/tutor/profile/education_info')->with('success','Education info Added successfully');
        }
        return back()->with('warning','Education info store failed');
    }

    protected function show($id)
    {
        $educationInfo = EducationalInfo::find($id);
        if ($educationInfo) return view('tutor.profile.edit.singleEducation');
    }

    protected function update(EducationalInfoValidator $request)
    {
        ($request->input('currentStudding') == null) ? $currently = 0:$currently=$request->input('currentStudding');
        $education = EducationalInfo::where([
                'id'=>$id,
                'user_id'=> Auth::user()->id
            ])->update([
            'label' => $request->input('label'),
            'major' => $request->input('major'),
            'curriculum' => $request->input('curriculum'),
            'exam_title' => $request->input('examTitle'),
            'institute' => $request->input('institute'),
            'id_card' => $request->input('idNumber'),
            'cGpa' => $request->input('cgpa'),
            'from' => $request->input('from'),
            'until' => $request->input('until'),
            'passed' => $request->input('passingYear'),
            'currently_studding' => $currently,
        ]);
        if ($education)
        {
            $educationInfoId = $education->id;
            return redirect('/tutor/profile/education/'.$educationInfoId)->with('success','Education info update successfully');
        }
        return back()->with('warning','Education info update failed');
    }
    // tutor view
    protected function getEducationAll()
    {
        $educations = EducationalInfo::where('user_id',Auth::user()->id)->get();

        return response()->json($educations);
    }
    // admin tutor education data view
    protected function getEducationAllAdmin($id)
    {
        $educations = EducationalInfo::where('user_id',$id)->get();

        return response()->json($educations);
    }
}
