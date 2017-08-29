<?php

namespace App\Tutor;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $id = 'id';

    protected $table = 'personal_info';

    protected $fillable = [
        'user_id', 'gender', 'marital_status','country','division', 'district', 'upazila',
        'location', 'zip_code','id_card_type','id_card_number', 'fb_link', 'linkdin_link',
        'father_name', 'father_phone','mother_name','mother_phone',
        'emergency_contact_name', 'emergency_contact_relation', 'emergency_contact_phone'
    ];

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
