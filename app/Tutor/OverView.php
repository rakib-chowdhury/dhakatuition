<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class OverView extends Model
{
    protected $id = 'id';

    protected $table = 'over_views';

    protected $fillable = ['user_id', 'title', 'over_view'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
