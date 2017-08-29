<?php

namespace App\Notification;

use Illuminate\Database\Eloquent\Model;

class OffersForTutor extends Model
{
    protected $id = 'id';

    protected $table = 'offers_for_tutors';

    protected $fillable = ['read_status','user_id','offer_id','status'];

    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers')->select(array('id','title'));
    }

    public function user()
    {
        return $this->belongsTo('App\User')->select(['id','first_name','last_name']);
    }
}
