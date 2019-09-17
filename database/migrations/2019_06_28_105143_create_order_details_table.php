<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->string('product_type');
            $table->string('product_size');
            $table->text('note');
            $table->string('quantity');
            $table->double('amount');
            $table->double('discount')->nullable();
            $table->double('total_amount');
            $table->string('status')->nullable();

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
        Schema::dropIfExists('order_details');
    }
}
