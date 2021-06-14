<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('doc_id');
            $table->integer('bed_allotment_id')->nullable();
            $table->integer('birth_report_id')->nullable();
            $table->integer('surgery_report_id')->nullable();
            $table->integer('medicine_purchase_id')->nullable();
            $table->integer('other_service_id')->nullable();
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
        Schema::dropIfExists('served_services');
    }
}
