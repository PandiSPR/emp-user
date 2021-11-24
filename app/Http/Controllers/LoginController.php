<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Address;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function test()
    {
        $employee= Users::find(1)->email;
        dd($employee);
    }
}