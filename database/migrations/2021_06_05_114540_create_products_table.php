<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('unit')->nullable();
            $table->string('count')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('rating')->nullable();
            $table->string('trade_mark')->nullable();
            $table->string('country_origin')->nullable();
            $table->unsignedInteger('collection_id');
            $table->timestamps();
            $table->foreign('collection_id')
                ->references('id')
                ->on('collections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
