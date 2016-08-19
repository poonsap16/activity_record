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
Route::get('holiday/create','HolidaysController@create');
Route::post('holiday','HolidaysController@store');
Route::get('holiday/{id}/edit','HolidaysController@edit');
Route::post('holiday/{id}','HolidaysController@update');

Route::get('calendar','CalendarsController@index');
Route::get('calendar/create','CalendarsController@create');
//Route::get('date','CalendarsController@date');
// Route::get('calendar/{id}/edit','CalendarsController@edit');
// Route::post('calendar/{id}','CalendarsController@update');

//รับข้อมูลจากฟอร์ม calendar
Route::get('result-from-post/{activity_name}/{start}/{stop}/{day}', function ($activity_name, $start, $stop, $day) {
	//return $activity_name."/".$start."/".$stop;
	$activitys = \App\Activity::all();
	//ตรวจสอบว่าวันที่เริ่มต้นจนถึงวันที่สิ้นสุด ตามวันที่เลือก
	//http://www.w3schools.com/php/func_date_date_create.asp
	//$date = date_add($date,date_interval_create_from_date_string("1 days"));
	$date_start=date_create($start);
	$date_stop=date_create($stop);
	echo date_format($date_start,"d/m/Y");
	echo "<br>";
	echo date_format($date_stop,"d/m/Y");
	echo "<br>";
	echo "<hr>";
	//echo date_format($date_start,"d/m/Y");
	$i=1;
	while ($date_start<=$date_stop) {
		echo date_format($date_start,"d/m/Y");
		echo "<br>";
		//หาว่าวันที่ที่รับมาเป็นวันอะไร ได้ค่า 1-7
		//echo date_format($date_start,"w");
		$date_mark = date_format($date_start,"w");
		echo $date_mark."=".$day;

		if($date_mark == $day){
		//$date_uses[$i] = $date_start;
		//$date_uses[$i] = $date_start->copy();
		$date_uses[$i] = clone $date_start; 
		echo date_format($date_uses[$i],"d/m/Y");
		}
		echo "<br>";
		$date_start = date_add($date_start,date_interval_create_from_date_string("1 days"));
		$i = $i+1;
	}
	//รับข้อมูลจากฟอร์ม calendar แล้วส่งไปหน้า date
	return view('activity.date', compact('activity_name','start','stop', 'day', 'activitys', 'date_uses'));
}); 


//ส่งข้อมูลจากหน้า calendar ไปหน้ารับข้อมูล
Route::post('calendar/date', function(){
	$data = Request::all();
	//ส่งข้อมูลไปหน้าเว็บสำหรับรับข้อมูลจากฟอร์ม
	return redirect("result-from-post/".$data['activity_name']."/".$data['date_begin']."/".$data['date_end']."/".$data['day']);
});

Route::post('calendar/data', function(){

});