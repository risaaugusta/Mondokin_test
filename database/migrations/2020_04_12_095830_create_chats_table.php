<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesantren_id');
            $table->unsignedBigInteger('santri_id');
            $table->enum('sender', ['santri', 'admin'])->default('santri');
            $table->text('message');
            $table->timestamps();

            $table->foreign('pesantren_id')->references('id')->on('pesantrens');
            $table->foreign('santri_id')->references('id')->on('santris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
