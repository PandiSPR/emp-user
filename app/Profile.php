<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','address'];


    public function User() 
    {
        return $this->belongsTo('App\User','user_id');
    }

}
