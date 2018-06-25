<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sc_id')->nullable();
            $table->integer('master_id')->unsigned()->nullable()->index();
            $table->integer('work_master_id')->index()->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('subcategory_id')->unsigned()->index();
            $table->integer('subway_id')->unsigned()->index()->nullable();
            $table->integer('price')->unsigned()->default(0);
            $table->string('header');
            $table->text('description')->nullable();
            $table->integer('amount')->unsigned()->nullable();
            $table->date("end_date")->nullable();
            $table->text("address")->nullable();
            $table->tinyInteger('safety');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign("master_id")->references("id")->on("masters")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("work_master_id")->references("id")->on("masters")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('orders');
    }
}
