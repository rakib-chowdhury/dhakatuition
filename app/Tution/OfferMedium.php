<?php

namespace App\Tution;

use Illuminate\Database\Eloquent\Model;

class OfferMedium extends Model
{
    protected $id = 'id';

    protected $table = 'offer_media';

    protected $fillable = ['offers_id','medium_id'];

    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers');
    }

    public function medium()
    {
        return $this->belongsTo('App\Admin\Info\Medium');
    }

}
