<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street_address');
            $table->string('town_city');
            $table->string('postcode_zip');
            $table->string('phone')->nullable();
            $table->string('email_address');
            $table->unsignedBigInteger('total_amount');
            $table->string('status')->default('pending'); // Default status to pending
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('registers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
