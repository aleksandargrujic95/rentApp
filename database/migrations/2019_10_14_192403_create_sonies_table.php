<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sonies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('rented')->default(false);
            $table->unsignedBigInteger('customer_id')->default(1);
            $table->tinyInteger('joystick')->default(0);
            $table->timestamp('date_of_rent')->useCurrent();
            $table->timestamp('date_of_giveback')->useCurrent();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sonies');
    }
}
