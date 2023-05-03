<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('users_notifications', function (Blueprint $table) {
    //         $table->increments('id', true);
    //         $table->integer('user_id')->unsigned();
    //         $table->foreign('user_id')->references('id')
    //               ->on('users')->onDelete('cascade');        
    //         $table->integer('notification_id')->unsigned();
    //         $table->foreign('notification_id')->references('id')
    //               ->on('notifications')->onDelete('cascade');
    //               $table->timestamps();
    //               $table->softDeletes();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('users_notifications');
    // }
}
