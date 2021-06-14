<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinePurchaseCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_purchase_collections', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('medicine_purchase_id');
            $table->integer('med_sale_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_purchase_collection');
    }
}
