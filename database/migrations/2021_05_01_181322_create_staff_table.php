<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('first_name', 45);
            $table->string('last_name',45);
            $table->date('dob');
            $table->dateTime('create_date');
            $table->string('sex',1);
            $table->string('specialization', 45)->nullable();
            $table->string('qualification', 45)->nullable();
            $table->string('blood_group', 3)->nullable();
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->string('remark');
            $table->string('img_url')->nullable();
            $table->string('role');
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
        Schema::dropIfExists('staff');
    }
}
