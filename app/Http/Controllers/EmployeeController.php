<?php

namespace App\Http\Controllers;


use App\Employee;
use Log;
use App\User;
use App\Simcard;
use App\Profile;
use App\Degree;
use App\Userdegree;
use App\Role;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class EmployeeController extends Controller
{

    public function index()
    {
         
        return view('employee', ['users' => User::all()]);
        
    }
    

    public function create()
    {        
        return view('add-employee-details')->with('success', 'Employee Details successfully added');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'sex'=>'required',
       
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->sex = $request->sex;
        $user->status=1; 
        $user->save();
        
        return redirect('/user');
    }
    
    
    public function view($id)
    {        
        $user = User::find($id);
        return view('view-employee-details')->with('user',$user);
    }

    public function edit($id)
    {        
        $user = User::find($id);
        return view('edit-employee-details')->with('user',$user);
    }
    
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'role' => 'required',
        'sex'=>'required',
        'status'=>'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->sex = $request->sex;
        $user->status=$request->status; 
        $user->save();


        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
    
    public function userChangeStatus(Request $request)
    {
        Log::info($request->all());
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    

    
    public function roleUser()
    {
        return view('role');
    }
    public function roleInsert(Request $request)
    {
        $validatedData = $request->validate([
         'name' => 'required',
          ]);

        $role = new Role();
        $role->name=$request->name;
        $role->guard_name="web";
        $role->save();
        return redirect('/user');
    }

    public function thanks()
    {
        $users=User::all();
        return view('thanks')->with('users',$users);
    }

    public function loginmail()
    {
        $users=User::all();
        return view('loginmail')->with('users',$users);
    }
   

    //login controller
    public function login()
    {
        return view('login');
    }
    public function login_auth(Request $request)
    {   
        $users = User::where('email', '=', $request->input('email'))->first();
        if($users===null)
        {
            return redirect('/')->with('status', 'E-mail does not exit ');
        }
        elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {   
            $userStatus = Auth::User()->status;
            if($userStatus=='1') 
            {
                // Mail::send('loginmail', ['users' => $users], function ($m) use ($users) {
                //     $m->from('hello@app.com', 'Successfully Login');
                //     $m->to($users->email, $users->name)->subject('Successfully Login');
                // });
                return redirect('/user')->with('users',$users);
            }
            else
            {   
                return redirect('/')->with('status', 'User Inactive');
            }
        }
        else{
            return redirect('/')->with('status', 'Invalid Password');
        }
    }
    

    
    public function registration()
    {
        return view('registration');
    }
    
    public function storeregistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'sex'=>'required',       
        ]);
        $users = new User();
        $users->name = $request->name;
        $users->role = $request->role;
        $users->email = $request->email;
        $users->password = Hash::make($request->input('password'));
        $users->sex = $request->sex;
        $users->status=1; 
        $users->save();
        

         
        $users = User::where('email', '=', $request->input('email'))->first();
        if($users===null)
        {
            return redirect('/')->with('status', 'E-mail does not exit ');
        }
        elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {   
            $userStatus = Auth::User()->status;
            if($userStatus=='1') 
            {
                Mail::send('loginmail', ['users' => $users], function ($m) use ($users) {
                    $m->from('hello@app.com', 'Successfully Registration');
                    $m->to($users->email, $users->name)->subject('Successfully Registration');
                });
                return redirect('/registration')->with('users',$users);
            }
            else
            {   
                return redirect('/registration')->with('status', 'User Inactive');
            }
        }
        else{
            return redirect('/registration')->with('status', 'Invalid Password');
        }
        return redirect('/registration');
    }
    


    public function logout()
    {
     Auth::logout();
     return redirect('/');
    }
 
    
    public function profileUser($id)
    {
        $user = User::find($id);
        return view('profile')->with('user',$user);
    }

    public function profileInsert(Request $request)
    {
        $validatedData = $request->validate([
         'address' => 'required',
          ]);
        $profile = new Profile();
        $profile->address=$request->address;
        $profile->user_id=Auth::user()->id; 
        $profile->save();
        return redirect('/one-to-one/dashboard');
    }

    
//    user_list controller
   public function onetooneshow($id)
   {    
        $users=User::find($id);
        return view('dashboard')->with('users',$users);
   }
 
    
   public function profileedit($id)
   {        
       $profile = Profile::find($id);
       return view('profileedit')->with('profile',$profile);
   }
   
   public function profileupdate(Request $request,$id)
   {
       $validatedData = $request->validate([
       'name' => 'required',
       'email' => 'required',
       'status'=>'required',
       ]);

       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->status=$request->status; 
       $user->save();


       return redirect('/one-to-one');
   }

   public function profiledestroy($id)
   {
       $user = User::find($id);
       $user->delete();
       return redirect('/one-to-one');
   }



   
   public function simcardUser()
   {
       return view('simcard');
   }
   public function simcardInsert(Request $request)
   {
       $validatedData = $request->validate([
        'number' => 'required',
         ]);

       $simcard = new Simcard();
       $simcard->number=$request->number;
       $simcard->user_id=Auth::user()->id; 
       $simcard->save();
       return redirect('/one-to-many/dashboard');
   }

  //user_list controller
  public function simcardShow()
  {    
      $users=User::all();
      if($users===null)
      {
          return redirect('/user')->with('status', 'User dose not have any relationships');
      }

      return view('simcard-dashboard')->with('users',$users);
  }
  

  public function degreeUser()
  {
      return view('degree');
  }
  public function degreeInsert(Request $request)
  {
      $validatedData = $request->validate([
       'name' => 'required',
       'status' => 'required',
        ]);

      $degree = new Degree();
      $degree->name=$request->name;
      $degree->status=$request->status;
      $degree->save();
      return redirect('/manytomany-dashboard');
  }


  
  //user_list controller
  public function manytomanyShow()
  {    
      $users=User::all();
      if($users===null)
      {
          return redirect('/user')->with('status', 'User dose not have any relationships');
      }

      return view('degree-dashboard')->with('users',$users);
  }


}