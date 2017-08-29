<?php

namespace App\Http\Controllers\AdminController\Info;

use App\Admin\Info\Subjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorSubjectController extends Controller
{
    protected function getName($id)
    {
        return Subjects::find($id);
    }

    protected function create(Request $request)
    {
        $this->validate($request,[
            'classId' => 'required',
            'subjectName' => 'required | max:100'
        ]);

        $subject = Subjects::create([
            'class_id' => $request->input('classId'),
            'subject_name' => $request->input('subjectName')
        ]);
        if ($subject) return redirect('/admin/info')->with('success','Subject Create successfully');
        return redirect('/admin/info')->with('warning','Subject Create failed');
    }

    protected function update($id, Request $request)
    {
        $this->validate($request,['subjectName' => 'required | max:100']);
        $subject = $this->subject($id)->update(['subject_name' => $request->input('subjectName')]);
        if ($subject) return redirect('/admin/info')->with('success','Subject Update successfully');
        return redirect('/admin/info')->with('warning','Subject Update failed');
    }

    protected function destroy($id)
    {
        $subject = $this->subject($id)->delete();
        if ($subject) return redirect('/admin/info')->with('success','Subject Delete Successfully');
        return redirect('/admin/info')->with('warning','Subject Delete Fail');
    }

    private function subject($id)
    {
        return Subjects::find($id);
    }

    protected function subjectUpdate(Request $request)
    {
        foreach ($request->input('classId') as $classId)
        {
            $updateSubject[] =  Subjects::where('class_id',$classId)->get();
        }
        return $updateSubject;
    }
}
