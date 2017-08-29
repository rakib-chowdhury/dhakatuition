<?php

namespace App\Http\Controllers\Offers;

use App\Notification\AdminToTutor;
use App\Notification\TutorToAdmin;
use App\Tution\Offers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OffersApplyController extends Controller
{
    protected function apply($offerId)
    {
        $apply = TutorToAdmin::create([
            'user_id' => Auth::user()->id,
            'offer_id' => $offerId,
            'read_status' => false,
            'status' => false
        ]);
        if ($apply) return back()->with('success','You applied successfully');
        return back()->with('warning','You applied failed');
    }

    protected function publish($id)
    {
        $publish = Offers::where('id',$id)->update(['status'=>1]);
        if ($publish) return back()->with('success','You published successfully');
        return back()->with('warning','You published failed');
    }

    protected function block($id)
    {
        $block = Offers::where('id',$id)->update(['status'=>0]);
        if ($block) return back()->with('success','You block successfully');
        return back()->with('warning','You block failed');
    }

    protected function show($id)
    {
        $offer = Offers::find($id);
        return view('offers.singleOffer', compact('offer'));
    }
    protected function selectTutor($tutorId, $applyId, $offerId)
    {
        $adminNote = AdminToTutor::create([
            'user_id' => $tutorId,
            'offer_id'=> $offerId
        ]);
        if ($adminNote){
            $hire = TutorToAdmin::find($applyId)->update(['status' => 1]);
            if ($hire) return redirect('/admin/offer/'. $offerId .'/view')->with('success','You Select Tutor for this offer');
        }
        return redirect('/admin/offer/'. $offerId .'/view')->with('warning','You Select Tutor for this offer is failed');
    }
    protected function deSelectTutor($applyId, $offerId)
    {
        $hire = TutorToAdmin::find($applyId)->update(['status' => 0]);
        if ($hire) return redirect('/admin/offer/'. $offerId .'/view')->with('success','You deSelect Tutor for this offer');
        return redirect('/admin/offer/'. $offerId .'/view')->with('warning','You deSelect Tutor for this offer is failed');
    }
}
