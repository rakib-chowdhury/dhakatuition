<?php

namespace App\Http\Controllers\AdminController\Info;

use App\Admin\Info\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorClassController extends Controller
{
    // get name
    protected function getName($id)
    {
        return Classes::find($id);
    }

    // create
    protected function create(Request $request)
    {
        $this->validate($request, [
            'mediumId' => 'required',
            'className' => 'required | max:100',
        ]);
        $class = Classes::create([
            'medium_id' => $request->input('mediumId'),
            'class_name' => $request->input('className')
        ]);
        if ($class) return redirect('/admin/info')->with('success','class create successfully');
        return redirect('/admin/info')->with('warning','class creation failed');
    }

    protected function update( $id, Request $request)
    {
        $this->validate($request, ['className' => 'required | max:100']);
        $class = $this->tutorClass($id)->update(['class_name' => $request->input('className')]);
        if ($class) return redirect('/admin/info')->with('success','Class Update successfully');
        return redirect('/admin/info')->with('warning','Class Update failed');
    }


    protected function destroy($id)
    {
        $class = $this->tutorClass($id)->delete();
        if ($class) return redirect('/admin/info')->with('success','Class Delete Successfully');
        return redirect('/admin/info')->with('warning','Class Delete Fail');
    }


    private function tutorClass($id)
    {
        return Classes::find($id);
    }

    protected function classUpdate(Request $request)
    {
//        return $request->input('data');
//        $updateClass = [];
//        $i = 0;
        foreach ($request->input('mediumId') as $mediumId)
        {
            $updateClass[] =  Classes::where('medium_id',$mediumId)->get();
        }
        return $updateClass;
    }
}
