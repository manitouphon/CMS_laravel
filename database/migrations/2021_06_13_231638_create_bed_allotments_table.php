<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_allotments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('bed_type');
            $table->integer('bed_number');
            $table->string('allotment_date')->nullable();
            $table->string('allotment_time')->nullable();
            $table->string('is_discharge');
            $table->string('discharge_date')->nullable();
            $table->string('discharge_time')->nullable();
            $table->string('served_service_id');
            $table->string("patient_id");
            $table->float('service_fee', 11, 2)->nullable();
            $table->integer('nurse_id');
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
        Schema::dropIfExists('bed_allotments');
    }
}
