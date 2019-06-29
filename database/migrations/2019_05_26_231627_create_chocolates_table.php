<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChocolatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chocolates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('full_price')->nullable();
            $table->string('half_price')->nullable();
            $table->string('quarter_price')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();

            $table->string('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('note_ar')->nullable();

            $table->softDeletes();
            $table->index(['deleted_at']);
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
        Schema::dropIfExists('chocolates');
    }
}
