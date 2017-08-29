<?php

namespace App\Http\Controllers;

use App\Notification\AdminToTutor;
use App\Notification\OffersForAdmin;
use App\Notification\OffersForTutor;
use App\Notification\TutorToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected function Offer()
    {
        if (Auth::user()->role == 1)
            return OffersForAdmin::where('read_status', 0)->count();
        return OffersForTutor::where('read_status',0)->count();
    }

    protected function academic()
    {
        if (Auth::user()->role == 1)
            return TutorToAdmin::where('read_status', 0)->count();
        return AdminToTutor::where('read_status', 0)->count();
    }

    protected function offerDown()
    {
        if (Auth::user()->role == 1){
            return OffersForAdmin::where('read_status', 0)->get();
        } else {
            return OffersForTutor::where('read_status',0)->get();
        }
    }

    protected function academicDown()
    {
        if (Auth::user()->role == 1){
            return TutorToAdmin::where('read_status', 0)->get();
        } else {
            return AdminToTutor::where('read_status',0)->get();
        }
    }
}
