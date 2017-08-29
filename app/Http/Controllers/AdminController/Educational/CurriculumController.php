<?php

namespace App\Http\Controllers\AdminController\Educational;

use App\Admin\Educational\Curriculum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('admin.educational.curriculum', compact('curriculums'));
    }
    public function allCurriculum()
    {
        return Curriculum::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['CurriculumName' => 'required | max:100']);

        $curriculum = Curriculum::create(['curriculum_name' => $request->input('CurriculumName')]);
        if ($curriculum) return redirect('/admin/education/curriculum')->with('success', 'Curriculum Store Successfully');
        return redirect('/admin/education/curriculum')->with('warning', 'Curriculum Store Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Curriculum::find($id);
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
        $this->validate($request, ['CurriculumName' => 'required | max:100']);

        $curriculum = $this->show($id)->update(['curriculum_name' => $request->input('CurriculumName')]);
        if ($curriculum) return redirect('/admin/education/curriculum')->with('success', 'Curriculum update Successfully');
        return redirect('/admin/education/curriculum')->with('warning', 'Curriculum update Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum = $this->show($id)->delete();
        if ($curriculum) return redirect('/admin/education/curriculum')->with('success', 'Curriculum update Successfully');
        return redirect('/admin/education/curriculum')->with('warning', 'Curriculum update Failed');
    }
}
