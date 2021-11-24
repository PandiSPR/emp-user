<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable =['name' , 'type'];

    public function users()
    {
        return $this->belongToMany('App\User');
    }
}
