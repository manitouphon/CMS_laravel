<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateBedAllotmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_allotment', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('bed_type');
            $table->integer('bed_number');
            $table->date('allotment_date')->nullable();
            $table->time('allotment_time')->nullable();
            $table->string('is_discharge');
            $table->date('discharge_date')->nullable();
            $table->time('discharge_time')->nullable();
            $table->float('service_fee', 11, 2)->nullable();
            $table->foreignId('nurse_id')->constrained('staff');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bed_allotment');
    }
}
