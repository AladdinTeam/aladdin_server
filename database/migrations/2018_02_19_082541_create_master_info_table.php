<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_id')->index()->unsigned();
            /*$table->tinyInteger('data_check')->default(0);
            $table->tinyInteger('contract_work')->default(0);
            $table->tinyInteger('guarantee')->default(0);
            $table->tinyInteger('certification')->default(0);
            $table->text('about')->nullable();*/
            $table->date('birthdate')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->text('about')->nullable();
            $table->text('sale')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign("master_id")->references("id")->on("masters")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_info');
    }
}
