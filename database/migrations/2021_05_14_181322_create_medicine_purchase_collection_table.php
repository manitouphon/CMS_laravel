<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinePurchaseCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_purchase_collection', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('medicine_purchase_id')->constrained('medicine_purchase');
            $table->foreignId('med_sale_id')->constrained('med_sale');

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
