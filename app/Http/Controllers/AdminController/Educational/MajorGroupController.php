<?php

namespace App\Http\Controllers\AdminController\Educational;

use App\Admin\Educational\EducationLabel;
use App\Admin\Educational\MazarGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = EducationLabel::with('mazarGroup')->get();
        if ($labels) return view('admin.educational.majorGroup', compact('labels'));
    }



    protected function getMajor($id)
    {
        return MazarGroup::where('education_label_id',$id)->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'labelId'   => 'required',
            'majorName' => 'required | max:100'
        ]);

        $major = MazarGroup::create([
            'education_label_id' => $request->input('labelId'),
            'group_name'         => $request->input('majorName')
        ]);
        if ($major) return redirect('/admin/education/major')->with('success', 'Major Group Store SuccessFully');
        return redirect('/admin/education/major')->with('warning', 'Major Group Store Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return MazarGroup::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'labelId'   => 'required',
            'majorName' => 'required | max:100'
        ]);
        $major = $this->show($id)->update([
            'education_label_id' => $request->input('labelId'),
            'group_name'         => $request->input('majorName')
        ]);
        if ($major) return redirect('/admin/education/major')->with('success', 'Major Group update SuccessFully');
        return redirect('/admin/education/major')->with('warning', 'Major Group update Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = $this->show($id)->delete();
        if ($major) return redirect('/admin/education/major')->with('success', 'Major Group delete SuccessFully');
        return redirect('/admin/education/major')->with('warning', 'Major Group delete Failed');
    }
}
