<?php

namespace App\Http\Controllers\AdminController\Educational;

use App\Admin\Educational\EducationLabel;
use App\Admin\Info\Medium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = EducationLabel::all();

        return view('admin.educational.label', compact('labels'));
    }

    protected function allLabel()
    {
        return EducationLabel::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['labelName' => 'required | max:100']);

        $label = EducationLabel::create(['label_name' => $request->input('labelName')]);

        if ($label) return redirect('/admin/education/label')->with('success', 'Educational Label Store successfully');
        return redirect('/admin/education/label')->with('warning', 'Educational Label Store failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EducationLabel::find($id);
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
        $this->validate($request, ['labelName' => 'required | max:100']);

        $label = $this->show($id)->update(['label_name' => $request->input('labelName')]);

        if ($label) return redirect('/admin/education/label')->with('success', 'Educational Label update successfully');
        return redirect('/admin/education/label')->with('warning', 'Educational Label update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = $this->show($id)->delete();
        if ($label) return redirect('/admin/education/label')->with('success', 'Educational Label delete successfully');
        return redirect('/admin/education/label')->with('warning', 'Educational Label delete failed');
    }
}
