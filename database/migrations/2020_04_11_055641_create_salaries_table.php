<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asatidz_id');
            $table->unsignedBigInteger('pesantren_id');
            $table->integer('amount')->default(0);
            $table->date('date');
            $table->boolean('received')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('asatidz_id')->references('id')->on('asatidzs');
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
        Schema::dropIfExists('salaries');
    }
}
