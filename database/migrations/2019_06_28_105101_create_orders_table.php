<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');

            $table->bigInteger('customer_id');
            $table->double('amount');
            $table->string('coupen')->nullable();
            $table->string('coupen_discount')->nullable();
            $table->string('discount')->nullable();
            $table->bigInteger('billing_address_id');
            $table->bigInteger('shipping_address_id');
            $table->bigInteger('shipping_method_id');
            $table->bigInteger('shipping_zone_id');
            $table->string('payment_method');
            $table->string('shipping_cost');
            $table->string('status');

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
