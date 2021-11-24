<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simcard extends Model
{
    
    protected $fillable = ['user_id','number'];


    public function User() 
    {
        return $this->belongsTo('App\User','user_id');
    }
}
