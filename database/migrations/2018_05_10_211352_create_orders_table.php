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
            $table->string('orderCode')->nullable();
            $table->string('address')->nullable();
            $table->string('receiver')->nullable();
            $table->string('mobile')->nullable();
            $table->string('userMessage')->nullable();
            $table->timestamp('createDate')->nullable();
            $table->timestamp('payDate')->nullable();
            $table->timestamp('deliveryDate')->nullable();
            $table->timestamp('confirmDate')->nullable();
            $table->string('status')->nullable();
            $table->integer('uid')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
