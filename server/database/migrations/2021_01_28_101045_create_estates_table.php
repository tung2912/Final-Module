<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('address');
            $table->decimal('price',10,2);
            $table->decimal('floor_space',10,2);
            $table->integer('bedroom_nums');
            $table->integer('bathroom_nums');
            $table->integer('garage_nums')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->default(1);

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('estates');
    }
}
