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
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_lt');
            $table->string('name_ar');
            $table->string('description');
            $table->string('type');
            $table->string('total_costs');
            $table->string('total_profits');
            $table->string('teacher_name');
            $table->string('session');
            $table->string('started_at');
            $table->string('ended_at');

            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
