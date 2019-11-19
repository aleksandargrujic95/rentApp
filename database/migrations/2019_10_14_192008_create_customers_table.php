<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('opstina')->default('Nema');
            $table->string('address')->default('Nema');
            $table->string('name')->default('No Name');
            $table->string('phone_number')->default('00000000000');
            $table->integer('number_of_rent')->default(0);
            $table->decimal('money_spent')->default(0);
            $table->string('comment')->default('Nema');
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
        Schema::dropIfExists('customers');
    }
}
