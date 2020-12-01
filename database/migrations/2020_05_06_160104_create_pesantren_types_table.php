<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesantrenTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesantren_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesantren_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('pesantren_types');
    }
}
