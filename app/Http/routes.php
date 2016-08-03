<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('load', function () {
// $result = App\TimeSheet::loadcsv($filename);
// if ($result)
// return "load สำเร็จ";
// else
// return "load ไม่สำเร็จ";
// });

Route::get('load/{file}', function ($filename) {
$result = App\TimeSheet::loadcsv($filename);
if ($result)
return "load สำเร็จ";
else
return "load ไม่สำเร็จ";
});


Route::get('activity','ActivitysController@index');
Route::get('activity/create','ActivitysController@create');
Route::post('activity','ActivitysController@store');
Route::get('activity/{id}/edit','ActivitysController@edit');
Route::post('activity/{id}','ActivitysController@update');

Route::get('holiday','HolidaysController@index');
//Route::get('holiday/create','HolidaysController@create');
Route::post('holiday','HolidaysController@store');