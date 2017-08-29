<?php

namespace App\Admin\Info;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'class';

    protected $fillable = ['class_name', 'medium_id'];

    // many to one relation with medium
    public function medium()
    {
        return $this->belongsTo('App\Admin\Info\Medium');
    }
    // one to many relation with subject
    public function subject()
    {
        return $this->hasMany('App\Admin\Info\Subjects','class_id','id');
    }

    public function offerClass()
    {
        return $this->hasMany('App\Tution\OfferClass');
    }

    public function TutorClass()
    {
        return $this->hasMany('App\Tutor\TutoringClasses');
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($class) {
            $class->subject()->delete();
        });
    }
}
