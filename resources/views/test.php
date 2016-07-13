<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    protected $table = 'staffs'; //ต้องมาเติม
    protected $fillable =[       //ต้องมาเติม
        'sap_id',      // ในfillablle สามารถมากำหนดว่าฟิลด์ไหนต้องใส่ข้อมูล
        'name',
        'dob',
        

    ];

    public function greeting() {
        return 'Hello, My name is ' . $this->attributes['name'] . '.';
    }
    
    public static function loadcsv()
    {
        /*
        use Illuminate\Support\Facades\DB;
        Change csv file here
        */
        $filename = public_path().'/assets/csv/init_staffs.csv';
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;
        else {
            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE){
                /*
                change table here
                */
                DB::table('staffs')->delete();
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
                Staff::create($item);
             // }
        }
        return true;
    }
}