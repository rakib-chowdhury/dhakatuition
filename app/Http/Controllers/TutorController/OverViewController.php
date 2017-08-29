<?php

namespace App\Http\Controllers\TutorController;

use App\Tutor\OverView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OverViewController extends Controller
{
    protected function store(Request $request)
    {
        $this->validate($request, [
            'title'     =>'required | max:50',
            'over_view' =>'required'
        ]);
        $overView = OverView::create([
            'user_id'   => Auth::user()->id,
            'title'     => $request->input('title'),
            'over_view' => $request->input('over_view')
        ]);
        if ($overView) return back()->with('success','personal overview added successfully');
        return back()->with('warning','personal overview added failed');
    }
    protected function update(Request $request)
    {
        $this->validate($request, [
            'title'     =>'required | max:50',
            'over_view' =>'required'
        ]);
        $overView = OverView::where('user_id',Auth::user()->id)->update([
            'title'     => $request->input('title'),
            'over_view' => $request->input('over_view')
        ]);
        if ($overView) return back()->with('success','personal overview update successfully');
        return back()->with('warning','personal overview update failed');
    }

    protected function getOverview()
    {
        $overView = OverView::where('user_id', Auth::user()->id)->first();
        return response()->json($overView);
    }

    protected function getOverviewAdmin($id)
    {
        $overView = OverView::where('user_id', $id)->first();
        return response()->json($overView);
    }
}
