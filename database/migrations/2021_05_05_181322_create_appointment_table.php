<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('room_num', 45);
            $table->date('appoint_date')->nullable();
            $table->float('appoint_fee', 11, 0)->nullable();
            $table->integer('doc_id');
            $table->integer('pat_id');
            $table->integer('recep_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
