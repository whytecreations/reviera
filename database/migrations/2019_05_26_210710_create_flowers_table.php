<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('flowers')) {
            Schema::create('flowers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('category_id')->nullable();
                $table->string('title')->nullable();
                $table->string('big_price')->nullable();
                $table->string('small_price')->nullable();
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
