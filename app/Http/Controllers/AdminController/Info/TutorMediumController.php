<?php

namespace App\Http\Controllers\AdminController\Info;

use App\Admin\Info\Medium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorMediumController extends Controller
{
    protected function index()
    {
        $mediums = Medium::all();
        return view('admin.medium',compact('mediums'));
    }

//    protected function allMedium()
//    {
//        $medium = Medium::all();
//        return response()->json($medium);
//    }

    protected function getName($id)
    {
        return Medium::find($id);
    }

    protected function create(Request $request)
    {
        $this->validate($request,['mediumName'=>'required | max:100']);
        $medium = Medium::create(['medium_category_name' => $request->input('mediumName')]);
        if ($medium == true) return redirect('/admin/info')->with('success','Medium Created Successfully');
        return redirect('/admin/info')->with('warning','Medium Created failed');
    }

    protected function update($id, Request $request)
    {
        $this->validate($request,['mediumName'=>'required | max:100']);
        $medium = $this->medium($id)->update(['medium_category_name' => $request->input('mediumName')]);
        if ($medium == true) return redirect('/admin/info')->with('success','Medium Update Successfully');
        return redirect('/admin/info')->with('warning','Medium Update failed');
    }

    protected function destroy($id)
    {
        $medium = $this->medium($id);
        $medium->delete();
        if ($medium) return redirect('/admin/info')->with('success','Medium Delete Successfully');
        return redirect('/admin/info')->with('warning','Medium Delete Fail');
    }

    private function medium($id)
    {
        return Medium::find($id);
    }

    protected function mediumUpdate()
    {
        return Medium::all();
    }
}
