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
        Schema::create('color_product', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('product_id')->references('id')->on('products');

            $table->primary(['color_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('color_product', function (Blueprint $table) {

            $table->dropForeign(['color_id']);
            $table->dropForeign(['product_id']);
            $table->dropColumn(['created_at']);
            $table->dropColumn(['updated_at']);
        });
    }
};
