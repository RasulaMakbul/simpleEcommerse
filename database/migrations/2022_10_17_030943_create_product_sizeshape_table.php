<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizeshape', function (Blueprint $table) {
            $table->unsignedBigInteger('sizeshape_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('sizeshape_id')->references('id')->on('sizeshapes');
            $table->foreign('product_id')->references('id')->on('products');

            $table->primary(['sizeshape_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizeshape');
    }
};
