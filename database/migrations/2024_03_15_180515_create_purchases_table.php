<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('purchase_bill_id');
            $table->unsignedBigInteger('sproduct_id');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('purchase_bill_id')->references('id')->on('purchase_bills')->onDelete('cascade');
            
            $table->foreign('sproduct_id')->references('id')->on('sub_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
