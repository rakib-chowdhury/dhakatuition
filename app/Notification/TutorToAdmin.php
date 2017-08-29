<?php

namespace App\Notification;

use Illuminate\Database\Eloquent\Model;

class TutorToAdmin extends Model
{
    protected $id = 'id';

    protected $table = 'tutor_to_admins';

    protected $fillable = ['user_id', 'offer_id', 'read_status', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User')->select(['id','first_name','last_name']);
    }
    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers')->select(['id','title']);
    }
}
