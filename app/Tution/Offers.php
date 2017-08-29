<?php

namespace App\Tution;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $id = 'id';

    protected $table = 'offers';

    protected $fillable = [
        'title','first_name','last_name','phone','relation',
        'email','student_amount','gender','salary','negotiable',
        'day_week','country','division','district',
        'location','specified_location','requirement','status'
    ];

    public function offerMedium()
    {
        return $this->hasMany('App\Tution\OfferMedium');
    }

    public function offerLocation()
    {
        return $this->belongsTo('App\Admin\Locations\TutoringLocation','location');
    }

    public function offerClass()
    {
        return $this->hasMany('App\Tution\OfferClass');
    }

    public function offerSubject()
    {
        return $this->hasMany('App\Tution\OfferSubject');
    }

    public function admin()
    {
        return $this->hasMany('App\Notification\OffersForAdmin','offer_id');
    }

    public function tutor()
    {
        return $this->hasMany('App\Notification\TutorToAdmin','offer_id');
    }

}
