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
        Schema::create('participents', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_ar');
            $table->string('name_lt');
            $table->string('type');
            $table->string('legal_form');
            $table->string('address_ar');
            $table->string('address_lt');
            $table->string('email');
            $table->string('mobile');
            $table->string('website');
            $table->string('tel');
            $table->string('fax');
            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participents');
    }
};
