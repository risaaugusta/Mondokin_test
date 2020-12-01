<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('nik')->nullable();
            $table->string('educational')->nullable();
            $table->enum('status', ['father', 'mother', 'wife', 'husband', 'child', 'delegate']);
            $table->string('birthplace')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('income')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
