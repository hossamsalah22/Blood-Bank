<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_setting_note', 'about_app', 'fb_link', 'tw_link', 'insta_link', 'youtube_link');

}