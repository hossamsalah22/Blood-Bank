<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id');

    public function clients()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Client');
    }

}