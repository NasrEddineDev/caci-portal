<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('firstname_ar');
            $table->string('firstname_lt');
            $table->string('lastname_ar');
            $table->string('lastname_lt');
            $table->string('position');
            $table->string('title');
            $table->string('email');//->unique();
            $table->string('mobile');//->unique();
            $table->string('tel');
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
        Schema::dropIfExists('managers');
    }
}
