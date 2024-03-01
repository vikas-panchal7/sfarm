<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pid'); // Assuming 'pid' is an unsigned integer
            $table->unsignedBigInteger('spid'); // Assuming 'spid' is an unsigned integer
            $table->unsignedBigInteger('agid'); // Assuming 'agid' is an unsigned integer

            // Add any other columns you need for the 'agent_products' table

            $table->timestamps();

            // Define foreign key constraints if needed
            $table->foreign('pid')->references('id')->on('products');
            $table->foreign('spid')->references('id')->on('sub_products');
            $table->foreign('agid')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_products');
    }
}
