<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'activation';

    protected $fillable = ['user_token','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
