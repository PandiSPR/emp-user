<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdegree extends Model
{
    
    protected $fillable = ['user_id','degree_id'];

    public function User()
    {
        return $this->belongsToMany('App\User','user_id','degree_id','id');
    }
}
