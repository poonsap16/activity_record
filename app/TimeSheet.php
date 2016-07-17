<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TimeSheet extends Model
{
    protected $table = 'timesheet';
    protected $fillable = [
    		'rfid',
    		'sap_id',
    		'date_time_stamp',
    		'reader_location',
    		'stamp_type',
    		'reader_id'
    ];

    public static function loadcsv($fileName) {
    	/*
  		use Illuminate\Support\Facades\DB;
		Change csv file here
	    */
  		$filePath = str_replace('public', 'scan_data_source', public_path()) . '/' . $fileName;
	    if(!file_exists($filePath) || !is_readable($filePath))
	    	return FALSE;
	 	else {
		    $header = NULL;
		    $data = array();
		    if (($handle = fopen($filePath, 'r')) !== FALSE){
		    	/*
				change table here
		    	*/
		        // DB::table('provinces')->delete();
		        while (($row = fgetcsv($handle, 300, ',')) !== FALSE){ //300 = max lenght of longest line
		            if(!$header)
		                $header = $row;
		            else
		                $data[] = array_combine($header, $row);
		        }
	        }
	        fclose($handle);
		}
		/*
		Change table model here
	    */
	    foreach ($data as $item) {
	    	// ใช้ '/' เพื่อแบ่งข้อมูล Y,M,D จาก format MM/DD//YYYY.
	    	$datePart = explode('/',$item['date']);
	    	// เรียงข้อมูลให้ยู่ในรูปแบบ YYYY-MM-DD แล้วบวกด้วย time. 
	    	$item['date_time_stamp'] = $datePart[2] . '-' . $datePart[0] . '-' . $datePart[1] . ' ' . $item['time'];
	    	// เช็คข้อมูล reader_location หากเป็น ---- ให้แปลงเป็น null
	    	$item['reader_location'] = $item['reader_location'] == '----' ? null : $item['reader_location'];
	    	// เช็คข้อมูล reader_id หากเป็น MAIN ให้แปลงเป็น 0
	    	$item['reader_id'] = $item['reader_id'] == 'MAIN' ? 0 : $item['reader_id'];
	    	// Insert $item ไปที่ตาราง timesheet. 
	    	TimeSheet::create($item);
	    }
	    return true;
    }
}
