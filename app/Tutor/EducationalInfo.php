<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
    protected $id = 'id';

    protected $table = 'education_info';

    protected $fillable = [
        'user_id', 'label', 'major', 'curriculum',
        'exam_title', 'institute', 'id_card', 'cGpa',
        'from','until', 'passed', 'currently_studding'
    ];

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
