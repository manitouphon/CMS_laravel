<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServedServicesCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('served_services_collection', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('served_service_id')->constrained('served_services');
            $table->foreignId('doc_id')->constrained('staff');
            $table->foreignId('pat_id')->constrained('patients');            $table->foreignId('total_payment_id')->constrained('total_payment');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('served_services_collection');
    }
}
