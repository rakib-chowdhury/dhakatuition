<?php

namespace App\Admin\Locations;

use Illuminate\Database\Eloquent\Model;

class TutoringLocation extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_locations';

    protected $fillable = ['name','tutoring_districts_id'];

    public function district()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringDistricts','location','id');
    }

    public function basicInfo()
    {
        return $this->hasOne('App\Tutor\TutoringBasicInfo');
    }

    public function preferredLocation()
    {
        return $this->hasMany('App\Tutor\TutoringLocation');
    }

    public function offers()
    {
        return $this->hasMany('App\Tution\Offers');
    }
}
