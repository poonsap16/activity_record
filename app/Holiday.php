<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $fillable = [
    		'holiday_id',
			'date',
			'holiday_name'

    ];
}
