<?php

namespace App\Admin\Info;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'subject';

    protected $fillable = ['subject_name','class_id'];

    public function Classes()
    {
        return $this->belongsTo('App\Admin\Info\Classes');
    }

    public function offerSubject()
    {
        return $this->hasMany('App\Tution\OfferSubject');
    }

    public function tutorSubject()
    {
        return $this->hasMany('App\tutor\TutoringSubjects');
    }

    public function tutoringSubject()
    {
        return $this->hasMany('App\Tutor\TutoringSubjects');
    }
}
