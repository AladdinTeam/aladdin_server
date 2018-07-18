<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_id')->index()->unsigned()->nullable();
            $table->integer('client_id')->index()->unsigned()->nullable();
            $table->string('channel');
            $table->timestamps();

            $table->foreign("master_id")->references("id")->on("masters")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
