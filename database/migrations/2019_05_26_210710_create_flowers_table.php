<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('flowers')) {
        Schema::create('flowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('big_price')->nullable();
            $table->string('small_price')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            
            $table->softDeletes();
            $table->index(['deleted_at']);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowers');
    }
}
