<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->unsigned();
            $table->string('activity_name', 100);
            $table->string('activity_acronym', 30);
            $table->time('start_time');
            $table->times('end_time');
            $table->string('job_id', 30);
            $table->tinyInteger('person_type')->unsigned();
            $table->tinyInteger('reader_location')->unsigned()->nullable();
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
        Schema::drop('activitys');
    }
}
