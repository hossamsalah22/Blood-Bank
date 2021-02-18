<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';
    public $timestamp = true;
    protected $fillable = array('type', 'client_id', 'token');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
