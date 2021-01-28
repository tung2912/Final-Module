<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('estate_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();//ko can reference, dung hasmanythrough de truy van
            $table->integer('status')->default(1);

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('estate_id')->references('id')->on('estates');
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
        Schema::dropIfExists('subscribes');
    }
}
