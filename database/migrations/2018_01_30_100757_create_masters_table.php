<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sc_id');
            $table->string('phone', 30);
            $table->string('email', 50);
            $table->string('password', 100)->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->rememberToken();
            $table->string('token', 255)->nullable();
            $table->timestamp('token_until')->nullable();
            $table->string("confirm_code", 6)->nullable();
            $table->string('email_code', 6)->nullable();
            $table->integer('verification_status')->default(0);
            $table->dateTime('call_time')->nullable();
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
        Schema::dropIfExists('masters');
    }
}
