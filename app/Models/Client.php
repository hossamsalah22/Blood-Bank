<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasApiTokens;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'email', 'password', 'd_o_b', 'last_donation', 'city_id', 'blood_type_id','pin_code');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }


    protected $hidden = [
        'password',
        'api_token',
    ];

    

}