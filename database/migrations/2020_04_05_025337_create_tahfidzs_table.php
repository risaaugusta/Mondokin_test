<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahfidzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahfidzs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asatidz_id');
            $table->unsignedBigInteger('santri_id');
            $table->decimal('pages', 4, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('asatidz_id')->references('id')->on('asatidzs');
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
        Schema::dropIfExists('tahfidzs');
    }
}
