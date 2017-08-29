<?php

namespace App\Admin\Info;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'medium_category';

    protected $fillable = ['medium_category_name'];

    // one to many relation with classes
    public function classes()
    {
        return $this->hasMany('App\Admin\Info\Classes');
    }

    public function offersMedium()
    {
        return $this->hasMany('App\Tution\OfferMedium');
    }

    public function tutorMedium()
    {
        return $this->hasMany('App\Tutor\TutoringMedium');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($medium) { // before delete() method call this
            $medium->classes()->delete();
            // do the rest of the cleanup...
        });
    }

}
