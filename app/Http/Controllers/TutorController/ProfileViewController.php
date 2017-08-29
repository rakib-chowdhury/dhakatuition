<?php

namespace App\Http\Controllers\TutorController;

use App\Admin\Info\Classes;
use App\Admin\Info\Medium;
use App\Admin\Info\Subjects;
use App\Admin\Locations\TutoringLocation;
use App\Tutor\TutoringBasicInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileViewController extends Controller
{
    protected function index()
    {
        return view('tutor.profile.view.profile');
    }
    protected function showAdmin($id)
    {
        return view('tutor.profile.view.adminView', compact('id'));
    }

    protected function create()
    {
        $data['tutorInfo']=Auth::user();/////14-03-2017
        //if(sizeof($data['tutorInfo']!=0)){
            //$data['tutorAllInfo']=
        //}
        return view('tutor.profile.create.tutorPanel',$data);
    }
    // tutor basic data view
    protected function basicInfo()
    {
        $info = TutoringBasicInfo::where('user_id',Auth::user()->id)
            ->with('tutorMedium.medium')
            ->with('tutorClass.infoClass')
            ->with('tutorSubject.subject')
            ->with('preferredLocation.location')
            ->with('tutoringDays')
            ->with('experience')
            ->with('onlineTutoringInfo')
            ->with('division','district','location')
            ->first();
        return response()->json($info);
    }
    // admin tutor basic data view
    protected function basicInfoAdmin($id)
    {
        $info = TutoringBasicInfo::where('user_id',$id)
            ->with('tutorMedium.medium')
            ->with('tutorClass.infoClass')
            ->with('tutorSubject.subject')
            ->with('preferredLocation.location')
            ->with('tutoringDays')
            ->with('experience')
            ->with('onlineTutoringInfo')
            ->with('division','district','location')
            ->first();
        return response()->json($info);
    }
    // public info view
    protected function getInfoForPublic()
    {
        $publicInfo = TutoringBasicInfo::with('tutorClass.infoClass')
            ->with('tutorSubject.subject')
            ->with('preferredLocation.location')
            ->with('user.overview')
            ->get();
        return response()->json($publicInfo);
    }
    // filter view
    protected function getFilterData(Request $request)
    {
        $location = $request->input('location');
//        $gender   = $request->input('gender');
        $medium   = $request->input('medium');
        $classes  = $request->input('class');
        $subject  = $request->input('subject');

        $tutors = TutoringBasicInfo::query();

        if (!empty($location))
        {
            $tutors->join('preferred_location', function ($join) use ($location) {
                $join->on('tutoring_basic_info.id', '=', 'preferred_location.tutoring_basic_info_id')
                    ->where('preferred_location.location_id', $location);
            });
        }

        if (!empty($medium))
        {
            $tutors->join('tutoring_media', function ($join) use ($medium) {
                $join->on('tutoring_basic_info.id', '=', 'tutoring_media.tutoring_basic_info_id')
                    ->where('tutoring_media.medium_id', $medium);
            });
        }

        if (!empty($classes))
        {
            $tutors->join('tutoring_classes', function ($join) use ($classes) {
                $join->on('tutoring_basic_info.id', '=', 'tutoring_classes.tutoring_basic_info_id')
                    ->where('tutoring_classes.classes_id', $classes);
            });
        }

        if (!empty($subject))
        {
            $subject->join('tutoring_subjects', function ($join) use ($subject) {
                $join->on('tutoring_basic_info.id', '=', 'tutoring_subjects.tutoring_basic_info_id')
                    ->where('tutoring_subjects.subject_id', $subject);
            });
        }

        $tutors->with('tutorClass.infoClass');
        $tutors->with('tutorSubject.subject');
        $tutors->with('preferredLocation.location');
        $tutors->with('user.overview');
        $tutors = $tutors->get();

        return response()->json($tutors);
    }


    protected function getMedium()
    {
        $medium = Medium::all();
        return response()->json($medium);
    }
    protected function getClass()
    {
        $class = Classes::all();
        return response()->json($class);
    }
    protected function getSubject()
    {
        $subject = Subjects::all();
        return response()->json($subject);
    }
    protected function getLocation()
    {
        $location = TutoringLocation::all();
        return response()->json($location);
    }
}
