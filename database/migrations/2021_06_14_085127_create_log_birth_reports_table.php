<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBirthReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_birth_reports', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->date('date')->nullable();
            $table->string('status')->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('des')->nullable();
            $table->float('service_fee', 10, 2)->nullable();
            $table->integer('doc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_birth_reports');
    }
}
