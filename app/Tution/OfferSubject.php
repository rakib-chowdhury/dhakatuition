<?php

namespace App\Tution;

use Illuminate\Database\Eloquent\Model;

class OfferSubject extends Model
{
    protected $id = 'id';

    protected $table = 'offer_subjects';

    protected $fillable = ['offers_id','subject_id'];

    public function offer()
    {
        return $this->belongsTo('App\Tution\Offers');
    }

    public function subject()
    {
        return $this->belongsTo('App\Admin\Info\Subjects');
    }
}
