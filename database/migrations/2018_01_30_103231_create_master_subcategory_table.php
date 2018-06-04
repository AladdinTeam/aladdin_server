<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_subcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subcategory_id')->unsigned()->index();
            $table->integer('master_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign("subcategory_id")->references("id")->on("subcategories")
                ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("master_id")->references("id")->on("masters")->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_subcategory');
    }
}
