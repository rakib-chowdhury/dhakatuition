<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringLocation extends Model
{
    protected $id = 'id';

    protected $table = 'preferred_location';

    protected $fillable = ['location_id', 'tutoring_basic_info_id'];

    public function basicInfo()
    {
        return $this->belongsTo('App\Tutor\TutoringBasicInfo');
    }

    public function location()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringLocation');
    }
}
