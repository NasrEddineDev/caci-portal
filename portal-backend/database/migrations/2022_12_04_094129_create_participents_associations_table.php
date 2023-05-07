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
        Schema::create('participents_associations', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('participent_id')->unsigned();
            $table->nullableMorphs('entity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('participent_id')->references('id')->on('participents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participents_associations');
    }
};
