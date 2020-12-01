<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesantren_id');
            $table->string('title');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('pesantren_id')->references('id')->on('pesantrens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
