<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class scan_data extends Model
{
    protected $table = 'scan_data';
    protected $fillable = [
    	'rfid_no',
    	'sap_id',
    	'name_surname',
    	'datestamp',
    	'timestamp',
    	'rfid_position',
    	'rfid_status',
    	'rfid_door',
    ]; 

    public static function loadcsv()
    {
        /*
        use Illuminate\Support\Facades\DB;
        Change csv file here
        */
        $filename = public_path().'/data/test.csv';
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;
        else {
            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE){
                /*
                change table here
                */
                DB::table('scan_data')->delete();
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
             // if($item['id'] != 'id'){
                scan_data::create($item);
             // }
        }
        return true;
    }
}
