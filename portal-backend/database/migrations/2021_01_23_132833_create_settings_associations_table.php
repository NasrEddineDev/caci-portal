<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_associations', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('value');
            $table->string('name');
            $table->string('description');
            $table->integer('setting_id')->unsigned();
            $table->nullableMorphs('entity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_associations');
    }
}
