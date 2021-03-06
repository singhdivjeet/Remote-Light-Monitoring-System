<?php

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
// Route::get('/foo', function () {
    // Artisan::call('storage:link');
    // });
   

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/logoutuser', 'UserController@logout');



Auth::routes();
Route::prefix('/app')->group(function () {
    Route::resource('/user', 'UserController');
    Route::resource('/document', 'Dashboard\DocumentController');
    Route::resource('/machine', 'Dashboard\MachineController');
    Route::resource('/task', 'Dashboard\TaskController');
    Route::resource('/taskdetail', 'Dashboard\TaskDetailController');
    Route::resource('/dashboardoverview', 'Dashboard\DashboardController');
    Route::resource('/pages', 'Dashboard\PagesController');



});


Route::get('/app/getunsignmachine','Dashboard\MachineController@getunsignmachine');
Route::get('/app/getunsigadmin','Dashboard\MachineController@getunsigadmin');
Route::get('/app/getmachinetask/{id}','Dashboard\TaskDetailController@getmachinetask');

Route::get('/app/getnotifa/{id}','Dashboard\TaskDetailController@getnotifa');
Route::get('/app/getnotifm/{id}','Dashboard\TaskDetailController@getnotifm');


Route::get('/app/getunsignmachinetask','Dashboard\TaskController@getunsignmachine');

Route::get('/app/useradmin','Dashboard\PagesController@getAdminUser');

Route::get('/app/getuserpages/{id}','Dashboard\PagesController@getuserpages');

Route::get('/app/getusertype/{id}','Dashboard\PagesController@getuserType');


Route::get('/app/superadmindashboardoverview','Dashboard\DashboardController@getSuperAdminMachine');
Route::get('/app/superadmingetmachinedaily/{id}','Dashboard\DashboardController@getSuperAdminMachineDataDaily');
Route::get('/app/superadmingetmachineweekly/{id}','Dashboard\DashboardController@getSuperAdminMachineDataWeekly');
Route::get('/app/superadmingetmachinemonthly/{id}','Dashboard\DashboardController@getSuperAdminMachineDataMonthly');

Route::get('/app/sensor/{id}','Dashboard\DashboardController@getsensordata');
Route::get('/app/subsensor/{id}/{len}','Dashboard\DashboardController@getsubsensordata');

Route::get('/app/mqtt/{id}/{bool}','Dashboard\DashboardController@mqttfunction');

Route::get('/app/status/{id}','Dashboard\DashboardController@getstatusdata');

Route::get('/app/taskmachine/{id}','Dashboard\TaskController@gettaskm');

Route::get('/app/getlonglat/{id}','Dashboard\TaskController@getlonglat');

Route::get('/app/subadmindashboardoverview','Dashboard\DashboardController@getsubAdminMachine');
Route::get('/app/subadmingetmachinedaily/{id}','Dashboard\DashboardController@getSubAdminMachineDataDaily');
Route::get('/app/subadmingetmachineweekly/{id}','Dashboard\DashboardController@getSubAdminMachineDataWeekly');
Route::get('/app/subadmingetmachinemonthly/{id}','Dashboard\DashboardController@getSubAdminMachineDataMonthly');

Route::get('/app/machineadmingetmachinedaily/{id}','Dashboard\DashboardController@getMachineAdminMachineDataDaily');
Route::get('/app/machineadmingetmachineweekly/{id}','Dashboard\DashboardController@getMachineAdminMachineDataWeekly');
Route::get('/app/machineadmingetmachinemonthly/{id}','Dashboard\DashboardController@getMachineAdminMachineDataMonthly');



//setting
Route::post('/app/updateUser','UserController@updateUser');
Route::get('/app/profile', 'UserController@profile');
Route::post('/app/changepassword', 'UserController@changePass');
Route::post('/app/updatepassword', 'UserController@updatepassword');
Route::post('/app/avatar','UserController@avatar');


Route::get('/test','testcontroller@index');

Route::any('/{slug}/{child}', [
    'uses' => 'HomeController@dashboard',
 ]);
Route::any('/{slug}/{child}/{sub}', [
    'uses' => 'HomeController@dashboard',
 ]);
Route::any('/{slug}/{child}/{sub}/{id}', [
    'uses' => 'HomeController@dashboard',
 ]);

