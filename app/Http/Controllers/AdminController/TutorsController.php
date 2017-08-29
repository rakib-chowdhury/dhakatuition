<?php

namespace App\Http\Controllers\AdminController;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorsController extends Controller
{
    protected function index()
    {
        $tutors = User::orderBy('created_at','desc')->paginate(25);
        return view('admin.tutors', compact('tutors'));
    }
    protected function block($id)
    {
        $block = User::find($id)->update(['status'=>1]);
        if ($block) return redirect('/admin/tutors')->with('success','Block Successfully');
        return redirect('/admin/tutors')->with('warning','Block failed');
    }
    protected function unBlock($id)
    {
        $block = User::find($id)->update(['status'=>0]);
        if ($block) return redirect('/admin/tutors')->with('success','UnBlock Successfully');
        return redirect('/admin/tutors')->with('warning','UnBlock failed');
    }
    protected function front($id)
    {
        if (User::find($id)->status == 1) return redirect('/admin/tutors')->with('warning','This Tutor is blocked');
        $block = User::find($id)->update(['status'=>2]);
        if ($block) return redirect('/admin/tutors')->with('success','Front set Successfully');
        return redirect('/admin/tutors')->with('warning','Front set failed');
    }
    protected function redoFront($id)
    {
        $block = User::find($id)->update(['status'=>3]);
        if ($block) return redirect('/admin/tutors')->with('success','redo front Successfully');
        return redirect('/admin/tutors')->with('warning','redo front failed');
    }
}
