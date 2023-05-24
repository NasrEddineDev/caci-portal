<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->string('name_fr')->nullable();
            $table->char('country_code',2);
            $table->string('fips_code')->nullable();
            $table->string('iso2')->nullable();
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->tinyInteger('flag')->default(1);
            $table->string('wiki_data_id')->nullable();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
