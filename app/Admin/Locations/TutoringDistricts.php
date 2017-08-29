<?php

namespace App\Admin\Locations;

use Illuminate\Database\Eloquent\Model;

class TutoringDistricts extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_districts';

    protected $fillable = ['name','tutoring_divisions_id'];

    public function division()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringDivisions');
    }

    public function location()
    {
        return $this->hasMany('App\Admin\Locations\TutoringLocation');
    }

    public function basicInfo()
    {
        return $this->hasOne('App\Tutor\TutoringBasicInfo');
    }
}
