<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsatidzSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asatidz_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('asatidz_id');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::dropIfExists('asatidz_subjects');
    }
}
