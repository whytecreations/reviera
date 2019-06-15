<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corporate_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address_type')->nullable();
            $table->text('address')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('nature_of_business')->nullable();
            $table->string('person_in_charge')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('corporates');
    }
}
