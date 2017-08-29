<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringClasses extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_classes';

    protected $fillable = ['tutoring_basic_info_id', 'classes_id'];


    public function infoClass()
    {
        return $this->hasOne('App\Admin\Info\Classes','id','classes_id')
            ->select('id','class_name');
    }

    public function basicInfo()
    {
        return $this->belongsTo('App\Tutor\TutoringBasicInfo');
    }
}
