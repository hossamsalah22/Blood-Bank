<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'blood_type_id', 'hospital_name', 'patient_age', 'blood_bags_num', 'hospital_address', 'client_id', 'notes', 'longitude', 'latitude', 'city_id');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}