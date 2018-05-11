<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->integer('stock');
            $table->string('spec');
            $table->string('component');
            $table->string('dosage');
            $table->string('function');
            $table->string('adverse_reaction');
            $table->string('taboo');
            $table->string('attention');
            $table->string('approval_number');
            $table->string('enterprise');
            $table->boolean('is_otc');
            $table->integer('cid');
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
        Schema::dropIfExists('products');
    }
}
