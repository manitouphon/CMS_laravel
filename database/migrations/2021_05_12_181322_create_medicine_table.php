<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('medicine_name');
            $table->string('category');
            $table->string('company');
            $table->integer('qty');
            $table->float('buy_price', 10, 2);
            $table->float('sell_price', 10, 2);
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('expiration_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine');
    }
}
