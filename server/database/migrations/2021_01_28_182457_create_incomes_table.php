<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscribe_id')->nullable();
            $table->decimal('amount',10,2);
            $table->decimal('e_commission',10,2);
            $table->decimal('company_income',10,2);
            $table->decimal('owner_income',10,2);

            $table->foreign('subscribe_id')->references('id')->on('subscribes');
            $table->timestamps();//payment_date = created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
