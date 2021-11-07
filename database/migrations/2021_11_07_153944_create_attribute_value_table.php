<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_attribute_id');
            $table->unsignedBigInteger('product_id');
            $table->text('images');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('SET NULL');
            $table->foreign('product_id')->references('id')->on('product_attributes')->onDelete('SET NULL');
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
        Schema::dropIfExists('attribute_value');
    }
}
