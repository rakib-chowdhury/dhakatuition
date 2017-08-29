<?php

namespace App\Admin\Educational;

use Illuminate\Database\Eloquent\Model;

class MazarGroup extends Model
{
    protected $id = 'id';

    protected $table = 'mazar_group';

    protected $fillable = ['education_label_id', 'group_name'];

    public function educationLabel()
    {
        return $this->belongsTo('App\Admin\Educational\EducationLabel');
    }
}
