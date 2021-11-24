<?php

namespace App\Http\Controllers;
use App\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class workerController extends Controller
{
   public function update(Request $request,$id)
   {

   // return $request;
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'sex'=>'required',
         ]);

  //  return "check";

    $employee = Employee::find($id);
    $employee->name = $request->name;
    $employee->email = $request->email;
    $employee->password = Hash::make($request->input('password'));
    $employee->sex = $request->sex;
    $employee->status=$request->status; 
    $employee->save();

   }
}
