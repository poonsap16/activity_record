<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScanData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scan_data', function (Blueprint $table) {
            $table->string('rfid_no',10);
            $table->string('sap_id',10);
            $table->string('name_surname',100);
            $table->date('datestamp');
            $table->time('timestamp');
            $table->string('rfid_position',2);
            $table->string('rfid_status',2);
            $table->string('rfid_door',5);
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
        Schema::drop('scan_data');
    }
}

