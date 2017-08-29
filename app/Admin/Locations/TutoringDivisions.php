<?php

namespace App\Admin\Locations;

use Illuminate\Database\Eloquent\Model;

class TutoringDivisions extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_divisions';

    protected $fillable = ['name'];

    public function district()
    {
        return $this->hasMany('App\Admin\Locations\TutoringDistricts');
    }

    public function basicInfo()
    {
        return $this->hasOne('App\Tutor\TutoringBasicInfo');
    }
}
