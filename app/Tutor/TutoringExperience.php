<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringExperience extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_experience';

    protected $fillable = ['experience_years', 'discription', 'tutoring_basic_info_id'];

    public function basicInfo()
    {
        return $this->belongsTo('App\Turor\TutoringBasicInfo');
    }
}
