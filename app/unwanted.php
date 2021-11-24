<?php

namespace App\Http\Controllers;


use App\Employee;
use Log;
use App\User;
use App\Simcard;
use App\Profile;
use App\Tag;
use App\Roles;
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
        'sex'=>'required',
        'status'=>'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
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
         'type' => 'required',
          ]);

        $role = new Role();
        $role->name=$request->name;
        $role->type=$request->type;
        $role->save();
        return redirect('/user');
    }

    public function thanks($id)
    {
        $users=User::find($id);
        return view('thanks')->with('users',$users);
    }

    public function loginmail()
    {
        $users=User::all();
        return view('loginmail')->with('users',$users);
    }
   
    
    public function degreeUser()
    {
        return view('degree');
    }
    public function degreeInsert(Request $request)
    {
        $validatedData = $request->validate([
         'name' => 'required',
         'type' => 'required',
          ]);

        $degree = new Degree();
        $role->name=$request->name;
        $role->type=$request->type;
        $role->save();
        return redirect('/user');
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
                Mail::send('loginmail', ['users' => $users], function ($m) use ($users) {
                    $m->from('hello@app.com', 'Successfully Login');
                    $m->to($users->email, $users->name)->subject('Successfully Login');
                });
                return redirect('user')->with('users',$users);
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
                Mail::send('thanks', ['users' => $users], function ($m) use ($users) {
                    $m->from('hello@app.com', 'Successfully Registration');
                    $m->to($users->email, $users->name)->subject('Successfully Registration');
                });
                return redirect('/thanks')->with('users',$users);
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
 
    
    public function profileUser()
    {
        return view('profile');
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
   public function onetooneshow()
   {    
        $users=User::all();
        if($users===null)
        {
            return redirect('/user')->with('status', 'User dose not have any relationships');
        }

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
  
 //user_list controller
 public function manytomanyShow(User $user)
 {   
    $users=User::all()->with('degrees');
    return view('manytomany-dashboard')->with('users',$users);

 }


 public function manytomany_show($id)
 {    
     $user =User::with('form')->find($id); 
    
     // return $user; 
     return view('relations/manytomany')->with('user',$user);
 }
 
 public function manytomany_form($id)
 {   
     $user=User::find($id);
     return view('relations/many_form')->with('many_user',$user);
 }
 public function manytomany_store(Request $request,$id)
 {
     $user =User::with('form')->find($id);
     $many_user= new Form;
     $many_user->user_id=$user->id;
     $many_user->hobies=$request->hobies;
     $many_user->save();
    return redirect('/dashboard');
 }
 

}





    
public function adminindex()
{
    return view('admin', ['users' => User::all()]);
}

public function admincreate()
{        
    return view('add-employee-details')->with('success', 'Employee Details successfully added');
}

public function adminstore(Request $request)
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
    
    return redirect('/admin');
}


public function adminview($id)
{        
    $user = User::find($id);
    return view('view-employee-details')->with('user',$user);
}

public function adminedit($id)
{        
    $user = User::find($id);
    return view('edit-employee-details')->with('user',$user);
}

public function adminupdate(Request $request,$id)
{
    $validatedData = $request->validate([
    'name' => 'required',
    'email' => 'required',
    'sex'=>'required',
    'status'=>'required',
    ]);

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->sex = $request->sex;
    $user->status=$request->status; 
    $user->save();


    return redirect('/admin');
}

public function admindestroy($id)
{
    $user = User::find($id);
    $user->delete();
    return redirect('/admin');
}



    
//Admin Controller - Dashboard
Route::get('/admin', 'EmployeeController@adminindex')->name('admin');
//Employee add Controller
Route::get('/admin/add', 'EmployeeController@admincreate')->name('/add');
Route::post('/add-admin', 'EmployeeController@adminstore')->name('/addemployee');
//Employee edit Controller
Route::get('admin/view/{id}', 'EmployeeController@adminview')->name('/view');
Route::get('admin/edit/{id}', 'EmployeeController@adminedit')->name('/edit');
Route::post('/admin/update/{id}', 'EmployeeController@adminupdate')->name('/update');
//Employee delete Controller
Route::get('/admin/delete/{id}', 'EmployeeController@admindestroy')->name('/delete');
//Employee logout Controller















<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

Auth::routes();
   

Route::get('/home', 'HomeController@index')->name('home');

//middleware by grouping
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');

   
});











//User login Controller
Route::get('/', 'EmployeeController@login')->name('login');
Route::post('/user', 'EmployeeController@login_auth')->name('sign_in_post');
//User registration Controller
Route::get('/registration', 'EmployeeController@registration')->name('registration');
Route::post('/', 'EmployeeController@storeregistration')->name('/login');




 
//User Controller - Dashboard
Route::get('/user', 'EmployeeController@index')->name('user');
//Employee add Controller
Route::get('/user/add', 'EmployeeController@create')->name('/add');
Route::post('/add-user', 'EmployeeController@store')->name('/addemployee');
//Employee edit Controller
Route::get('user/view/{id}', 'EmployeeController@view')->name('/view');
Route::get('user/edit/{id}', 'EmployeeController@edit')->name('/edit');
Route::post('/user/update/{id}', 'EmployeeController@update')->name('/update');
//Employee delete Controller
Route::get('/user/delete/{id}', 'EmployeeController@destroy')->name('/delete');
//Employee logout Controller
Route::get('/logout', 'EmployeeController@logout')->name('logout');
Route::get('userChangeStatus', 'EmployeeController@userChangeStatus');
//User Role Controller
Route::get('/role', 'EmployeeController@roleuser')->name('role');
Route::post('/roleInsert', 'EmployeeController@roleInsert')->name('insertrole');

Route::get('/thanks', 'EmployeeController@thanks')->name('thanks');
Route::get('/loginmail', 'EmployeeController@loginmail')->name('loginmail');
//Profile User List Route ---- one-to-one
Route::get('/one-to-one/dashboard/{id}', 'EmployeeController@onetooneshow')->name('one-to-one');
Route::get('/one-to-one/profile/{id}', 'EmployeeController@profileUser')->name('profile');
Route::post('/one-to-one/profileInsert', 'EmployeeController@profileInsert')->name('insertprofile');


//Simcard User List Route ----- one-to-many
Route::get('/one-to-many/dashboard', 'EmployeeController@simcardShow')->name('one-to-many');

Route::get('/one-to-many/simcard', 'EmployeeController@simcardUser')->name('simcard');
Route::post('/one-to-many/simcardInsert', 'EmployeeController@simcardInsert')->name('insertSimcard');


//User Degree Controller
//Degree User List Route ----- one-to-many
// Route::get('/many-to-many/dashboard', 'EmployeeController@degreeShow')->name('many-to-many');
Route::get('/many-to-many/degree', 'EmployeeController@degreeuser')->name('degree');
Route::post('/many-to-many/degreeInsert', 'EmployeeController@degreeInsert')->name('insertdegree');



//User Degree List Route ----- many-to-many

Route::get('/manytomany-dashboard', 'EmployeeController@manytomanyShow')->name('manytomany');





//Employee Controller - Dashboard
// Route::get('/employee', 'EmployeeController@index')->name('employee');
//Employee add Controller
// Route::get('/employee/add', 'EmployeeController@create')->name('/add');
// Route::post('/add-employee', 'EmployeeController@store')->name('/addemployee');
// //Employee edit Controller
// Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('/edit');
// Route::post('/employee/update/{id}', 'EmployeeController@update')->name('/update');
//Employee delete Controller
// Route::get('/employee/delete/{id}', 'EmployeeController@destroy')->name('/delete');
// //Employee logout Controller
// Route::get('/logout', 'EmployeeController@logout')->name('logout');
// Route::get('userChangeStatus', 'EmployeeController@userChangeStatus');











