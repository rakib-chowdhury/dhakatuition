<?php

namespace App\Http\Controllers\Notification;

use App\Notification\AdminToTutor;
use App\Notification\OffersForAdmin;
use App\Notification\OffersForTutor;
use App\Notification\TutorToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    protected function index()
    {
        return view('notification.notification');
    }

    protected function AdminNotification()
    {
        $offerNotification['offer'] = OffersForAdmin::with('offer')->orderBy('created_at','desc')->paginate(20);
        $offerNotification['tutor'] = TutorToAdmin::with('user','offer')->orderBy('created_at','desc')->paginate(20);

        return response()->json($offerNotification);
    }

    protected function tutorNotificationView()
    {
        return view('notification.tutorNotification');
    }

    protected function tutorNotificaiton()
    {
        $offerNotification['offer'] = OffersForTutor::with('offer')->orderBy('created_at','desc')->paginate(20);
        $offerNotification['admin'] = AdminToTutor::with('user','offer')->orderBy('created_at','desc')->paginate(20);

        return response()->json($offerNotification);
    }
}
