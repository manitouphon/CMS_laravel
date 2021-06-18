<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_sale', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('qty');
            $table->float('total', 11, 0);
            $table->foreignId('medicine_id')->constrained('medicine');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med_sale');
    }
}
