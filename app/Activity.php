<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activitys';
    protected $fillable = [
    		'activity_id',
			'activity_name',
			'activity_acronym',
			'start_time',
			'end_time',
			'job_id',
			'person_type',
			'reader_location'
    ];

    protected $reader_location = ['','ห้องวิกิจฯ', 'Mobile 1', 'Mobile 2', 'OPD'];

	public function getRecordLocationName(){
		return $this->reader_location[$this->attributes['reader_location']];
	}
}
