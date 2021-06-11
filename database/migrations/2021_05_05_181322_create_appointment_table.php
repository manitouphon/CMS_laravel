<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();

            $table->string('room_num', 45);
            $table->date('appoint_date')->nullable();
            $table->float('appoint_fee', 11, 0)->nullable();
            $table->foreignId('doc_id')->constrained('staff');
            $table->foreignId('pat_id')->constrained('patients');            $table->foreignId('recep_id')->nullable()->constrained('staff');
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
