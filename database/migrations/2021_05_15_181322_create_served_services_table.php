<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('served_services', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->float('total_fee', 11, 2)->nullable();

            $table->foreignId('bed_allotment_id')->constrained('bed_allotment');
            $table->foreignId('birth_report_id')->constrained('birth_report');
            $table->foreignId('surgery_report_id')->constrained('surgery_report');
            $table->foreignId('medicine_purchase_id')->constrained('medicine_purchase');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('served_services');
    }
}
