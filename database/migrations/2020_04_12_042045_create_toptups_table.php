<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToptupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->integer('amount')->default(0);
            $table->string('notes')->nullable();
            $table->string('confirmation_photo')->nullable();
            $table->enum('type', ['transfer', 'cash'])->default('cash');
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('topups');
    }
}
