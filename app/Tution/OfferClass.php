<?php

namespace App\Tution;

use Illuminate\Database\Eloquent\Model;

class OfferClass extends Model
{
    protected $id = 'id';

    protected $table = 'offer_classes';

    protected $fillable = ['offers_id','classes_id'];

    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers');
    }

    public function classes()
    {
        return $this->belongsTo('App\Admin\Info\Classes');
    }
}
