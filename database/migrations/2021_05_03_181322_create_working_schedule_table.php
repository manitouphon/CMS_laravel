<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_schedules', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('staff_working_schedule_id');
            $table->boolean('status_day')->default(1);
            $table->boolean('status_hour')->default(1);
            $table->integer('staff_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_schedule');
    }
}
