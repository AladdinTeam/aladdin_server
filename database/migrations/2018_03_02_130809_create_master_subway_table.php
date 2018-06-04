<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSubwayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_subway', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_id')->index()->unsigned();
            $table->integer('subway_id')->index()->unsigned();

            $table->foreign("master_id")->references("id")->on("masters")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("subway_id")->references("id")->on("subways")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_subway');
    }
}
