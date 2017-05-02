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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/import-employees',['uses'=>'EmployeeController@importDisplay','as'=>'import.show']);
Route::post('/import-employees',['uses'=>'EmployeeController@importUpload','as'=>'import.post']);


Route::get('/all-employees',function (){
    return \App\Employee::get()->map(function (\App\Employee $employee){
        return $employee->morphToJSON();
    });
});

Route::get('/mail',['uses'=>'EmployeeController@showMail','as'=>'send.show']);
Route::post('/mail-send',['uses'=>'EmployeeController@sendMail','as'=>'mail.send']);