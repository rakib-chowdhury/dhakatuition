<?php

namespace App\Http\Controllers\AdminController\location;

use App\Admin\Locations\TutoringDivisions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = TutoringDivisions::all();

        return view('admin.tutoringLocation', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['divisionName' => 'required | max:100']);
        $divison = TutoringDivisions::create(['name' => $request->input('divisionName')]);
        if ($divison) return redirect('/admin/location')->with('success','Division store Successfully');
        return redirect('/admin/location')->with('warning','Division store fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TutoringDivisions::find($id);
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
        $this->validate($request, ['divisionName' => 'required | max:100']);
        $divison = $this->show($id)->update(['name' => $request->input('divisionName')]);
        if ($divison) return redirect('/admin/location')->with('success','Division update Successfully');
        return redirect('/admin/location')->with('warning','Division Update fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divison = $this->show($id)->delete();
        if ($divison) return redirect('/admin/location')->with('success','Division Delete Successfully');
        return redirect('/admin/location')->with('warning','Division Delete fail');
    }

    public function divisionUpdate()
    {
        return TutoringDivisions::all();
    }
}
