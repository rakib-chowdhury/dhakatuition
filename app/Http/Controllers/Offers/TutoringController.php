<?php

namespace App\Http\Controllers\Offers;

use App\Http\Requests\OfferValidation;
use App\Notification\OffersForAdmin;
use App\Notification\OffersForTutor;
use App\Tution\OfferClass;
use App\Tution\OfferMedium;
use App\Tution\Offers;
use App\Tution\OfferSubject;
use App\Tutor\TutoringBasicInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringController extends Controller
{
    protected function store(OfferValidation $offerValidation)
    {
        // checking input arrays
        if (is_array($offerValidation->input('medium')) == false) return response()->json('Medium must be a array');
        if (is_array($offerValidation->input('Class')) == false) return response()->json('Class must be a array');
        if (is_array($offerValidation->input('Subject')) == false) return response()->json('Subject must be a array');
        // input offrers table
        $offerTable = Offers::create([
            'title'       => $offerValidation->input('title'),
            'first_name'  => $offerValidation->input('firstName'),
            'last_name'   => $offerValidation->input('lastName'),
            'phone'       => $offerValidation->input('phone'),
            'relation'    => $offerValidation->input('relation'),
            'email'       => $offerValidation->input('email'),
            'gender'      => $offerValidation->input('gender'),
            'salary'      => $offerValidation->input('salary'),
            'day_week'    => $offerValidation->input('days'),
            'country'     => $offerValidation->input('country'),
            'division'    => $offerValidation->input('division'),
            'district'    => $offerValidation->input('district'),
            'location'    => $offerValidation->input('location'),
            'requirement' => $offerValidation->input('offerRequirement'),
            'student_amount'    => $offerValidation->input('studentAmount'),
            'specified_location'=> $offerValidation->input('speceficLocaiotn'),
        ]);

        if ($offerTable)
        {
            // first catch offer id
            $offerId = $offerTable->id;

            $this->storeOfferMedium($offerId, $offerValidation->input('medium'));
            $this->storeOfferClasses($offerId, $offerValidation->input('Class'));
            $this->storeOfferSubject($offerId, $offerValidation->input('Subject'));

            // send notification to admin
            $this->AdminOfferNote($offerId);

            // send notification to all preferred location user
            $this->offerNotificationForTutor($offerId,$offerTable->location);


            return redirect('/')->with('success','Offers Post Successfully');
        }
        return back()->with('warning','Can not store offer');
    }

    private function storeOfferMedium($offerId, $mediumId)
    {
        if (is_array($mediumId))
        {
            foreach ($mediumId as $id)
            {
                $offerMedium = OfferMedium::create([
                    'offers_id' => $offerId,
                    'medium_id' => $id
                ]);
            }
            return $offerMedium;
        } else {
            $offerMedium = OfferMedium::create([
                'offers_id' => $offerId,
                'medium_id' => $id
            ]);
            return $offerMedium;
        }
    }

    private function storeOfferClasses($offerId, $classId)
    {
        if (is_array($classId))
        {
            foreach ($classId as $id)
            {
                $offerClass = OfferClass::create([
                    'offers_id'  => $offerId,
                    'classes_id' => $id
                ]);
            }
            return $offerClass;
        } else {

            $offerClass = OfferClass::create([
                'offers_id'  => $offerId,
                'classes_id' => $id
            ]);
            return $offerClass;
        }
    }

    private function storeOfferSubject($offerId, $subjectId)
    {
        if (is_array($subjectId))
        {
            foreach ($subjectId as $id)
            {
                $offerSubject = OfferSubject::create([
                    'offers_id'  => $offerId,
                    'subject_id' => $id
                ]);
            }
            return $offerSubject;
        } else {
            $offerSubject = OfferSubject::create([
                'offers_id'  => $offerId,
                'subject_id' => $id
            ]);
            return $offerSubject;
        }
    }

    private function AdminOfferNote($offerId)
    {
        return OffersForAdmin::create([
            'offer_id' => $offerId,
            'read_status' => false
        ]);
    }

    protected function offerNotificationForTutor($offerId, $offerLocation)
    {
        $users = TutoringBasicInfo::where('location', $offerLocation)->value('user_id');

        if (!empty($users) || $users != null) {
            if (is_array($users))
            {
                foreach ($users as $user)
                {
                    $successStore = $this->TutorOfferNote($offerId,$user);
                }
            } else {
                $successStore = $this->TutorOfferNote($offerId,$users);
            }
            if ($successStore) return true;
        }
        return false;
    }

    private function TutorOfferNote($offerId,$userId)
    {
        return OffersForTutor::create([
            'user_id' => $userId,
            'offer_id' => $offerId,
            'read_status' => false,
        ]);
    }
}
