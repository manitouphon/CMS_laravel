<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServedServicesCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('served_services_collections', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('served_service_id');
            $table->integer('pat_id');
            $table->integer('total_payment_id');
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
