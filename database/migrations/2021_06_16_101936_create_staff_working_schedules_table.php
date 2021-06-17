<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
class CreateStaffWorkingSchedulesTable extends Migration
=======
<<<<<<< HEAD:database/migrations/2021_06_16_093404_create_services_table.php
class CreateServicesTable extends Migration
=======
class CreateStaffWorkingSchedulesTable extends Migration
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4:database/migrations/2021_06_16_101936_create_staff_working_schedules_table.php
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD:database/migrations/2021_06_16_093404_create_services_table.php
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('remark');
            $table->string('des');
=======
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
        Schema::create('staff_working_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('working_schedule_id');
            $table->char('working_day', 7); // 0
            $table->string('start_time');
            $table->string('end_time');
<<<<<<< HEAD
=======
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4:database/migrations/2021_06_16_101936_create_staff_working_schedules_table.php
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
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
<<<<<<< HEAD
        Schema::dropIfExists('staff_working_schedules');
=======
<<<<<<< HEAD:database/migrations/2021_06_16_093404_create_services_table.php
        Schema::dropIfExists('services');
=======
        Schema::dropIfExists('staff_working_schedules');
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4:database/migrations/2021_06_16_101936_create_staff_working_schedules_table.php
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
    }
}
