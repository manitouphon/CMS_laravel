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
            $table->integer('doc_id');
            $table->integer('patient_id');
            $table->integer('service_id');
            $table->integer('medicine_purchase_id')->nullable();
            $table->integer('total_payment_id');
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
