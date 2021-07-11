<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->string('image')->nullable();
            $table->unsignedInteger('section_id');
            $table->timestamps();
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
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
        Schema::dropIfExists('collections');        
    }
}
