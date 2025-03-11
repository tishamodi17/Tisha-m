<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->string('prod_name');
            $table->string('prod_img');
            $table->string('prod_price');
            $table->string('qty');
            $table->string('description');
            $table->enum('status',['Instock','Outstock'])->default('Instock');
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
};
