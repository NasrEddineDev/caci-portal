<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('legal_form');
            $table->string('type');
            $table->string('status')->default("Active");
            $table->integer('balance');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('address_fr');
            $table->string('email');//->unique();
            $table->string('mobile');//->unique();
            $table->string('tel')->nullable();//->unique();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->integer('manager_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
