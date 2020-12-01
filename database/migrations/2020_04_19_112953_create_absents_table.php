<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id');
            $table->foreignId('asatidz_id');
            $table->timestamps();

            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('asatidz_id')->references('id')->on('asatidzs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absents');
    }
}
