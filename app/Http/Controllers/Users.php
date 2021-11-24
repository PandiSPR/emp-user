<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Users extends Controller implements MustVerifyEmail
{
    function index()
    {
        return User::find(1)->profile;
    }
}