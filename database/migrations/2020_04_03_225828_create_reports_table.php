<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->string('file');
            $table->enum('category', ['tahfidz', 'academic'])->default('academic');
            $table->string('year', 4)->default('2020');
            $table->enum('semester', ['1', '2']);
            $table->timestamps();

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
        Schema::dropIfExists('reports');
    }
}
