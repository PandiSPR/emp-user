<?php

namespace App;


use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{
    protected $table = 'employees';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
        'name', 'email', 'password', 'sex'  
    ];
}
