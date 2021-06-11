<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->date('dob');
            $table->string('sex', 10);
            $table->string('phone_number', 45);
            $table->string('address', 45)->nullable();
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('medical_history')->nullable();
            $table->string('img_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
