<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesantren_id');
            $table->string('code', 10)->nullable();
            $table->string('name');
            $table->integer('amount')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
