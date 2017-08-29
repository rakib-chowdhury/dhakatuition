<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringDays extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_days';

    protected $fillable = ['tutoring_basic_info_id', 'days'];

    public function basicInfo()
    {
        return $this->hasOne('App\Tutor\TutoringBasicInfo');
    }
}
