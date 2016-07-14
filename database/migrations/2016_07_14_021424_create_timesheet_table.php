<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfid', 24);
            $table->integer('sap_id')->unsigned();
            $table->timestamp('date_time_stamp');
            $table->tinyInteger('reader_location')->unsigned()->nullable();
            $table->boolean('stamp_type');
            $table->tinyInteger('reader_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timesheet');
    }
}
