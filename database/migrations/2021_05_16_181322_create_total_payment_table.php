<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_payments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('date');
            $table->float('sub_total', 10, 2);
            $table->float('pay', 10, 2);
            $table->float('balance', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_payment');
    }
}
