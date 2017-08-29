<?php

namespace App\Http\Controllers\Offers;

use App\Tution\Offers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OfferViewController extends Controller
{
    protected function index()
    {
        return view('offers.jobs');
    }

    protected function publicView()
    {
        return view('offers.public');
    }

    protected function offers()
    {
        $offers = Offers::with(
            'offerMedium.medium',
            'offerClass.classes',
            'offerSubject.subject',
            'offerLocation'
        )->orderBy('created_at', 'desc')->get();
        return response()->json($offers);
    }

    protected function filter(Request $request)
    {

        $location = $request->input('location');
        $gender   = $request->input('gender');
        $medium   = $request->input('medium');
        $classes  = $request->input('class');
        $subject  = $request->input('subject');

        $offers = Offers::query();
         if (Input::has('location')){
            $offers->where('location',$location);
        }

        if (Input::has('gender')){
            $offers->where('gender',$gender);
        }
        if (!empty($medium)){
            $offers->join('offer_media', function ($join) use ($medium) {
                $join->on('offers.id', '=', 'offer_media.offers_id')
                    ->where('offer_media.medium_id', $medium);
            });
//            $offers->with(['offerMedium' => function ($query) use ($medium) {
//                $query->where('medium_id', $medium);
//            }]);
        }
//
        if (!empty($classes)){
            $offers->join('offer_classes', function ($join) use ($classes) {
                $join->on('offers.id', '=', 'offer_classes.offers_id')
                    ->where('offer_classes.classes_id', $classes);
            });
//            $offers->with(['offerClass' => function ($query) use ($classes) {
//                $query->where('classes_id', $classes);
//            }]);
        }
//
        if (!empty($subject)){
            $offers->join('offer_subjects', function ($join) use ($subject) {
                $join->on('offers.id', '=', 'offer_subjects.offers_id')
                    ->where('offer_subjects.subject_id', $subject);
            });
//            $offers->with(['offerSubject' => function ($query) use ($subject) {
//                $query->where('subject_id', $subject);
//            }]);
        }
        $offers->with('offerMedium.medium')->with('offerClass.classes')->with('offerSubject.subject');
        $offers = $offers->orderBy('created_at', 'desc')->get();

        return response()->json($offers);
    }
}
