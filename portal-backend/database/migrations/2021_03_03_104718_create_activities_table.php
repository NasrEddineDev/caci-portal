<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('code');
            $table->string('group_ar');
            $table->string('group_en');
            $table->string('group_fr');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
            // $table->integer('enterprise_id')->unsigned();
            // $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
