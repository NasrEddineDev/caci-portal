<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
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
        Schema::dropIfExists('members');
    }
}
