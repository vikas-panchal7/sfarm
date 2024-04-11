<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentProductPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('sub_product_id');
            $table->decimal('price', 10, 2);
            // Add any other columns you might need

            // Foreign key constraints
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('sub_product_id')->references('id')->on('sub_products');

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
        Schema::dropIfExists('agent_product_prices');
    }
}
