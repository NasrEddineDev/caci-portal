<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Employee information
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('firstname_ar');
            $table->string('firstname_lt');
            $table->string('lastname_ar');
            $table->string('lastname_lt');
            $table->string('position');
            $table->string('department');
            $table->string('subdepartment');
            $table->string('office');
            $table->string('title');
            $table->string('email');//->unique();
            $table->string('mobile');
            $table->string('tel');
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('birthday');
            $table->string('address_ar');
            $table->string('address_lt');
            $table->string('picture');
            $table->string('language');
            $table->string('theme');
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
