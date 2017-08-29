<?php

namespace App\Http\Controllers\TutorController;

use App\Http\Requests\Tutor\BasicInfoValidator;
use App\Tutor\TutoringBasicInfo;
use App\Tutor\TutoringClasses;
use App\Tutor\TutoringDays;
use App\Tutor\TutoringExperience;
use App\Tutor\TutoringLocation;
use App\Tutor\TutoringMedium;
use App\Tutor\TutoringOnlineInfo;
use App\Tutor\TutoringSubjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutoringInfoController extends Controller
{

    protected function store(BasicInfoValidator $basicInfoValidator)
    {
        ($basicInfoValidator->input('studentHome') == null) ? $studentHome = 0:$studentHome = $basicInfoValidator->input('studentHome');
        ($basicInfoValidator->input('yourHome') == null) ? $yourHome = 0:$yourHome = $basicInfoValidator->input('yourHome');
        ($basicInfoValidator->input('online') == null) ? $online = 0:$online = $basicInfoValidator->input('online');
        ($basicInfoValidator->input('personalTutoring') == null) ? $personal = 0:$personal = $basicInfoValidator->input('personalTutoring');
        ($basicInfoValidator->input('groupTutoring') == null) ? $group = 0:$group = $basicInfoValidator->input('groupTutoring');
        ($basicInfoValidator->input('negotiable') == null) ? $negotiable = 0:$negotiable = $basicInfoValidator->input('negotiable');

        // finally store tutoring info
        $basicInfo = TutoringBasicInfo::create([
            'user_id' => Auth::user()->id,
            'tutoring_contact_no' => $basicInfoValidator->input('contactNo'),
            // tutoring type
            'student_home' => $studentHome,
            'tutor_home'   => $yourHome,
            // 'online_home'  => $basicInfoValidator->input('online'),
            'online_home'  => $online,
            'experience'   => $basicInfoValidator->input('experience'),
            // location
            'country'  => $basicInfoValidator->input('country'),
            'division' => $basicInfoValidator->input('division'),
            'district' => $basicInfoValidator->input('district'),
            'location' => $basicInfoValidator->input('location'),
            // ability
            'available_from' => $basicInfoValidator->input('availableTo'),
            'available_to'   => $basicInfoValidator->input('availableFrom'),
            // salary
            'salary'            => $basicInfoValidator->input('salary'),
            'salary_negotiable' => $negotiable,
            // tutoring style
            'personal_tutoring' => $personal,
            'group_tutoring'    => $group,
        ]);
        if ($basicInfo == false) return back()->with('warning','Base info store failed');
        // store tutoring basic info Mediums
        $infoMedium = $this->storeMediums($basicInfo->id,
            $basicInfoValidator->input('mediumId')
        );
        if ($infoMedium == false) return back()->with('warning','medium store failed');

        // store tutoring basic info class
        $infoClass = $this->storeClasses($basicInfo->id,
            $basicInfoValidator->input('classId')
        );

        if ($infoClass == false) return back()->with('warning','class store failed');
        // store tutoring basic info Subjects
        $infoSubject = $this->storeSubjects($basicInfo->id,
            $basicInfoValidator->input('subjectId')
        );
        if ($infoSubject == false) return back()->with('warning','subject store failed');

        //store tutoring preferred location
        $preferredLocation = $this->storePreferredLocation($basicInfo->id,
            $basicInfoValidator->input('preferredLocation')
        );
        if ($preferredLocation == false) return back()->with('warning','location store failed');

        //store tutoring Days
        $infoDays = $this->storeDays($basicInfo->id,
            $basicInfoValidator->input('tutoringDay')
        );
        if ($infoDays == false) return back()->with('warning','days store failed');
        // store experience info
        $infoExperience = $this->createExperience($basicInfo->id,
            $basicInfoValidator->input('experience'),
            $basicInfoValidator->input('experienceYear'),
            $basicInfoValidator->input('experienceDetail')
        );
        if ($infoExperience == false) return back()->with('warning','experience store failed');
        // store online info
        $infoOnline = $this->storeOnlineInfo($basicInfo->id,
            $basicInfoValidator->input('online'),
            $basicInfoValidator->input('skypeId'),
            $basicInfoValidator->input('googleId')
        );
        if ($infoOnline == false) return back()->with('warning','inline info store failed');

        return redirect('/tutor/profile')->with('success','info create successfully');
    }

    private function createExperience($infoId, $experienceValue, $year, $detail)
    {
        if ($experienceValue == 1)
        {
            $experience = TutoringExperience::create([
                'experience_years' => $year,
                'discription'      => $detail,
                'tutoring_basic_info_id' => $infoId
            ]);
            return $experience;
        }
        return true;
    }

    private function storeOnlineInfo($infoId, $onlineValue, $skype, $google)
    {
        if ($onlineValue == 1)
        {
            $onlineInfo = TutoringOnlineInfo::create([
                'skype_id' => $skype,
                'gmail_id' => $google,
                'tutoring_basic_info_id' => $infoId
            ]);
            return $onlineInfo;
        }
        return true;
    }

    private function storeMediums($id, $mediums)
    {
        if (is_array($mediums))
        {
            foreach ($mediums as $medium)
            {
                $tutoringMedium = TutoringMedium::create([
                            'tutoring_basic_info_id'=> $id,
                            'medium_id' => $medium
                        ]);
            }
            return $tutoringMedium;
        } else {
            $tutoringMedium = TutoringMedium::create([
                'tutoring_basic_info_id'=> $id,
                'medium_id' => $mediums
            ]);
            return $tutoringMedium;
        }
    }

    private function storeClasses($id, $classes)
    {
        if (is_array($classes))
        {
            foreach ($classes as $classId)
            {
                $tutoringClass = TutoringClasses::create([
                    'tutoring_basic_info_id' => $id,
                    'classes_id' => $classId
                ]);
            }
            return $tutoringClass;
        } else {
            $tutoringClass = TutoringClasses::create([
                'tutoring_basic_info_id' => $id,
                'classes_id' => $classes
            ]);
            return $tutoringClass;
        }
    }

    private function storeSubjects($id, $subjects)
    {
        if (is_array($subjects))
        {
            foreach ($subjects as $subject)
            {
                $tutoringSubject = TutoringSubjects::create([
                        'tutoring_basic_info_id' => $id,
                        'subject_id' => $subject
                    ]);
            }
            return $tutoringSubject;
        } else {
            $tutoringSubject = TutoringSubjects::create([
                'tutoring_basic_info_id' => $id,
                'subject_id' => $subjects
            ]);
            return $tutoringSubject;
        }
    }

    private function storePreferredLocation($id, $locations)
    {
        if (is_array($locations))
        {
            foreach ($locations as $locationId)
            {
                $preferredLocation = TutoringLocation::create([
                    'tutoring_basic_info_id' => $id,
                    'location_id' => $locationId
                ]);
            }
            return $preferredLocation;
        } else {
            $preferredLocation = TutoringLocation::create([
                'tutoring_basic_info_id' => $id,
                'location_id' => $locations
            ]);
            return $preferredLocation;
        }
    }

    private function storeDays($id, $days)
    {
        if (is_array($days))
        {
            foreach ($days as $day)
            {
                $tutoringDays = TutoringDays::create([
                    'tutoring_basic_info_id' => $id,
                    'days' => $day
                ]);
            }
            return $tutoringDays;
        } else {
            $tutoringDays = TutoringDays::create([
                'tutoring_basic_info_id' => $id,
                'days' => $days
            ]);
            return $tutoringDays;
        }
    }
}

