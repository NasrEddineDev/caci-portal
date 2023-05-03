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
        Schema::create('entity_settings', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('description');
            $table->integer('setting_id')->unsigned();
            $table->foreign('setting_id')->references('id')
                  ->on('settings')->onDelete('cascade');
            $table->nullableMorphs('entity_settings');

                  $table->timestamps();
                  $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_settings');
    }
}
