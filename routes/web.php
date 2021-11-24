<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
   



//User login Controller
Route::get('/', 'EmployeeController@login')->name('login');
Route::post('/user', 'EmployeeController@login_auth')->name('sign_in_post');
//User registration Controller
Route::get('/registration', 'EmployeeController@registration')->name('registration');
Route::post('/', 'EmployeeController@storeregistration')->name('/login');




 

//middleware by grouping
Route::group(['middleware' => ['auth']], function() {

    // Route::resource('roles','RoleController');
    // Route::resource('users','UserController');
    // Route::resource('products','ProductController');
//User Controller - Dashboard
// Route::get('/admin', 'EmployeeController@adminindex')->name('admin');
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



   
});
