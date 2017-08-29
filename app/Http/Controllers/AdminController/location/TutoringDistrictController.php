<?php

namespace App\Http\Controllers\AdminController\location;

use App\Admin\Locations\TutoringDistricts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringDistrictController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'divisionId' => 'required',
            'districtName' => 'required | max:100',
        ]);
        $districts = TutoringDistricts::create([
            'tutoring_divisions_id' => $request->input('divisionId'),
            'name' => $request->input('districtName')
        ]);
        if ($districts) return redirect('/admin/location')->with('success','District store Successfully');
        return redirect('/admin/location')->with('warning','District store fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TutoringDistricts::find($id);
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
        $this->validate($request,[
            'divisionId' => 'required',
            'districtName' => 'required | max:100',
        ]);
        $districts = $this->show($id)->update([
            'tutoring_divisions_id' => $request->input('divisionId'),
            'name' => $request->input('districtName')
        ]);
        if ($districts) return redirect('/admin/location')->with('success','District update Successfully');
        return redirect('/admin/location')->with('warning','District update fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $districts = $this->show($id)->delete();
        if ($districts) return redirect('/admin/location')->with('success','District update Successfully');
        return redirect('/admin/location')->with('warning','District update fail');
    }

    public function districtUpdate($divisionId)
    {
        $districts = TutoringDistricts::where('tutoring_divisions_id',$divisionId)->get();
        return $districts;
    }
}
