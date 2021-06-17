<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldBedAllotments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bed_allotments');
        Schema::create('bed_allotments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('bed_type');
            $table->integer('bed_number');
            $table->string('allotment_date')->nullable();
            $table->time('allotment_time')->nullable();
            $table->string('is_discharge');
            $table->string('discharge_date')->nullable();
            $table->string('discharge_time')->nullable();
            $table->float('service_fee', 11, 2)->nullable();
            $table->integer('nurse_id');
            $table->integer('served_service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
