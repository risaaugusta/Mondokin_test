<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asatidz_id');
            $table->string('name');
            $table->enum('day', ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']);
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['publish', 'draft']);
            $table->timestamps();

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
        Schema::dropIfExists('schedules');
    }
}
