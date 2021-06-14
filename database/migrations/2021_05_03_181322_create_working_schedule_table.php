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
        Schema::create('working_schedule', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->char('working_day', 7)->nullable(); // 0
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->boolean('status_day')->default(1);
            $table->boolean('status_hour')->default(1);
            $table->foreignId('staff_id')->constrained('staff');
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
