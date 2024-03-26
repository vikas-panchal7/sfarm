<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('commission');
            $table->unsignedBigInteger('bill_amount');
            $table->decimal('total_amount', 10, 2);
            

            $table->foreign('agent_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('farmer_id')->references('id')->on('registers')->onDelete('cascade');
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
        Schema::dropIfExists('sales_bills');
    }
}
