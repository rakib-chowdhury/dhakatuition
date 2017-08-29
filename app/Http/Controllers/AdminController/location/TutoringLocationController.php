<?php

namespace App\Http\Controllers\AdminController\location;

use App\Admin\Locations\TutoringLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutoringLocationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'districtId' => 'required',
            'locationName' => 'required | max:100'
        ]);

        $location = TutoringLocation::create([
            'tutoring_districts_id' => $request->input('districtId'),
            'name' => $request->input('locationName')
        ]);

        if ($location) return redirect('/admin/location')->with('success','Location update Successfully');
        return redirect('/admin/location')->with('warning','Location update fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TutoringLocation::find($id);
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
            'districtId' => 'required',
            'locationName' => 'required | max:100'
        ]);

        $location = $this->show($id)->update([
            'tutoring_districts_id' => $request->input('districtId'),
            'name' => $request->input('locationName')
        ]);

        if ($location) return redirect('/admin/location')->with('success','Location store Successfully');
        return redirect('/admin/location')->with('warning','Location store fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = $this->show($id);
        if ($location) return redirect('/admin/location')->with('success','Location delete Successfully');
        return redirect('/admin/location')->with('warning','Location delete fail');
    }

    protected function locationUpdate($districtId)
    {
        $locations = TutoringLocation::where('tutoring_districts_id',$districtId)->get();
        return $locations;
    }
}
