<?php

namespace App\Admin\Educational;

use Illuminate\Database\Eloquent\Model;

class EducationLabel extends Model
{
    protected $id = 'id';

    protected $table = 'education_label';

    protected $fillable = ['label_name'];

    public function mazarGroup()
    {
        return $this->hasMany('App\Admin\Educational\MazarGroup');
    }
}
