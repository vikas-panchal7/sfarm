<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid'); // Assuming uid is a foreign key
            $table->unsignedBigInteger('spid'); // Assuming spid is a foreign key
            $table->decimal('price', 10, 2); // Assuming price is decimal
            $table->integer('qty'); // Assuming qty is integer
            $table->decimal('total_price', 10, 2); // Assuming total_price is decimal
            $table->timestamps();

            // Define foreign key constraints if needed
            $table->foreign('uid')->references('id')->on('registers');
            $table->foreign('spid')->references('id')->on('sub_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
