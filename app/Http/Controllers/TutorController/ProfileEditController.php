<?php

namespace App\Http\Controllers\TutorController;

use App\Admin\Locations\TutoringLocation;
use App\Http\Requests\Tutor\BasicInfoValidator;
use App\Tutor\TutoringBasicInfo;
use App\Tutor\TutoringClasses;
use App\Tutor\TutoringDays;
use App\Tutor\TutoringExperience;
use App\Tutor\TutoringMedium;
use App\Tutor\TutoringOnlineInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller
{
    protected function update(BasicInfoValidator $basicInfoValidator)
    {
//        dd($basicInfoValidator);
        ($basicInfoValidator->input('studentHome') == null) ? $studentHome = 0:$studentHome = $basicInfoValidator->input('studentHome');
        ($basicInfoValidator->input('yourHome') == null) ? $yourHome = 0:$yourHome = $basicInfoValidator->input('yourHome');
        ($basicInfoValidator->input('online') == null) ? $online = 0:$online = $basicInfoValidator->input('online');
        ($basicInfoValidator->input('personalTutoring') == null) ? $personal = 0:$personal = $basicInfoValidator->input('personalTutoring');
        ($basicInfoValidator->input('groupTutoring') == null) ? $group = 0:$group = $basicInfoValidator->input('groupTutoring');
        ($basicInfoValidator->input('negotiable') == null) ? $negotiable = 0:$negotiable = $basicInfoValidator->input('negotiable');

        // finally store tutoring info
        $basicInfo = TutoringBasicInfo::where('user_id', Auth::user()->id)->update([
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
        $infoMedium = $this->updateMedium($basicInfo->id,
            $basicInfoValidator->input('mediumId')
        );
        if ($infoMedium == false) return back()->with('warning','medium store failed');

        // store tutoring basic info class
        $infoClass = $this->updateClasses($basicInfo->id,
            $basicInfoValidator->input('classId')
        );

        if ($infoClass == false) return back()->with('warning','class store failed');
        // store tutoring basic info Subjects
        $infoSubject = $this->updateSubject($basicInfo->id,
            $basicInfoValidator->input('subjectId')
        );
        if ($infoSubject == false) return back()->with('warning','subject store failed');

        //store tutoring preferred location
        $preferredLocation = $this->updatepreferredLocation($basicInfo->id,
            $basicInfoValidator->input('preferredLocation')
        );
        if ($preferredLocation == false) return back()->with('warning','location store failed');

        //store tutoring Days
        $infoDays = $this->availableDays($basicInfo->id,
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

        return redirect('/tutor/profile')->with('success','info update successfully');
    }
    // medium delete
    protected function mediumDelete($id)
    {
        $mediumDelete = TutoringMedium::where('medium_id',$id)->delete();
        if ($mediumDelete) return response()->json(true);
        return response()->json(false);
    }

    private function updateMedium($id,$mediums)
    {
        if (is_array($mediums)){
            foreach ($mediums as $medium)
            {
                $mediumUpdate = TutoringMedium::updateOrCreate([
                    'tutoring_basic_info_id'=> $id,
                    'medium_id' => $medium
                ]);
            }
            return $mediumUpdate;
        } else {
            $mediumUpdate = TutoringMedium::updateOrCreate([
                'tutoring_basic_info_id'=> $id,
                'medium_id' => $mediums
            ]);
            return $mediumUpdate;
        }
    }

    private function updateClasses($id,$classes)
    {
        if (is_array($classes)){
            foreach ($classes as $class)
            {
                $classUpdate = TutoringClasses::updateOrCreate([
                    'tutoring_basic_info_id'=> $id,
                    'classes_id' => $class
                ]);
            }
            return $classUpdate;
        } else {
            $classUpdate = TutoringClasses::updateOrCreate([
                'tutoring_basic_info_id'=> $id,
                'classes_id' => $classes
            ]);
            return $classUpdate;
        }
    }

    private function updateSubject($id,$subjects)
    {
        if (is_array($subjects)){
            foreach ($subjects as $subject)
            {
                $classUpdate = TutoringClasses::updateOrCreate([
                    'tutoring_basic_info_id'=> $id,
                    'subject_id' => $subject
                ]);
            }
            return $classUpdate;
        } else {
            $subjectUpdate = TutoringClasses::updateOrCreate([
                'tutoring_basic_info_id'=> $id,
                'classes_id' => $subjects
            ]);
            return $subjectUpdate;
        }
    }

    private function updatepreferredLocation($id, $locations)
    {
        if (is_array($locations))
        {
            foreach ($locations as $location)
            {
                $locationUpdate = TutoringLocation::updateOrCreate([
                    'tutoring_basic_info_id' => $id,
                    'location_id' => $location
                ]);
            }
            return $locationUpdate;
        } else {
            $locationUpdate = TutoringLocation::updateOrCreate([
                'tutoring_basic_info_id' => $id,
                'location_id' => $locations
            ]);
            return $locationUpdate;
        }
    }

    private function availableDays($id, $days)
    {
        if (is_array($days))
        {
            foreach ($days as $day)
            {
                $dayUpdate = TutoringDays::updateOrCreate([
                    'tutoring_basic_info_id' => $id,
                    'days' => $day
                ]);
            }
            return $dayUpdate;
        } else {
            $dayUpdate = TutoringDays::updateOrCreate([
                'tutoring_basic_info_id' => $id,
                'days' => $days
            ]);
            return $dayUpdate;
        }
    }



    private function createExperience($infoId, $experienceValue, $year, $detail)
    {
        if ($experienceValue == 1)
        {
            $experience = TutoringExperience::updateOrCreate([
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
            $onlineInfo = TutoringOnlineInfo::updateOrCreate([
                'skype_id' => $skype,
                'gmail_id' => $google,
                'tutoring_basic_info_id' => $infoId
            ]);
            return $onlineInfo;
        }
        return true;
    }
}
