<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_item', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('medicine_name');
            $table->string('dosage');
            $table->foreignId('prescription_id')->constrained('prescription');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_item');
    }
}
