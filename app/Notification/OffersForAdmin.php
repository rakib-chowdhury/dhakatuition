<?php

namespace App\Notification;

use Illuminate\Database\Eloquent\Model;

class OffersForAdmin extends Model
{
    protected $id = 'id';

    protected $table = 'offers_for_admins';

    protected $fillable = ['read_status','offer_id'];

    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers')->select(array('id','title'));
    }
}
