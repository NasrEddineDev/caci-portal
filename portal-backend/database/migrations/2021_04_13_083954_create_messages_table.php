<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('from');
            $table->string('to');
            $table->string('subject');
            $table->text('body');
            $table->enum('type', ['Inbox', 'Sent', 'Trash', 'Draft', 'Spam']);
            $table->enum('status', ['Read', 'Pending', 'Saved', 'Deleted']);
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
