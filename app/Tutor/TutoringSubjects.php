<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringSubjects extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_subjects';

    protected $fillable = ['tutoring_basic_info_id', 'subject_id'];

    public function basicInfo()
    {
        return $this->belongsTo('App\Tutor\TutoringBasicInfo');
    }

    public function subject()
    {
        return $this->belongsTo('App\Admin\Info\Subjects')
            ->select(array('id','subject_name'));
    }
}
