<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional__services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->index()->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->tinyInteger('cheched')->default(0);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->
                onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional__services');
    }
}
