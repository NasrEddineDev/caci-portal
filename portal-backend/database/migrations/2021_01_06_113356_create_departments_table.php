<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('type');
            $table->string('status')->default("Active");
            $table->string('email');
            $table->string('mobile');
            $table->string('tel')->nullable();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('departments');
    }
}
