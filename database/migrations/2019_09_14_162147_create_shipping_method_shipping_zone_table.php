<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingMethodShippingZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_method_shipping_zone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('shipping_method_id');
            $table->bigInteger('shipping_zone_id');
            $table->bigInteger('shipping_charge');
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
        Schema::dropIfExists('shipping_method_shipping_zone');
    }
}
