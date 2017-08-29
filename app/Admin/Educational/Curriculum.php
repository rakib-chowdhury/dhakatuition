<?php

namespace App\Admin\Educational;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $id = 'id';

    protected $table = 'curriculum';

    protected $fillable = ['curriculum_name'];
}
