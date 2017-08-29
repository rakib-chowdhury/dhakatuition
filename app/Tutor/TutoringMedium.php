<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutoringMedium extends Model
{
    protected $id = 'id';

    protected $table = 'tutoring_media';

    protected $fillable = ['tutoring_basic_info_id', 'medium_id'];

    public function medium()
    {
        return $this->belongsTo('App\Admin\Info\Medium')->select(array('id','medium_category_name'));
    }
    public function basicInfo()
    {
        return $this->belongsTo('App\Tutor\TutoringBasicInfo');
    }
}
