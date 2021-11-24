<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [ 'name' , 'status' ];
    
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
