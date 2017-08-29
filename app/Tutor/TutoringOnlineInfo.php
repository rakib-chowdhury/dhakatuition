<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringOnlineInfo extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_online_info';

    protected $fillable = ['skype_id','gmail_id','tutoring_basic_info_id'];

    public function basicInfo()
    {
        return $this->belongsTo('App\Tutor\TutoringBasicInfo');
    }
}
