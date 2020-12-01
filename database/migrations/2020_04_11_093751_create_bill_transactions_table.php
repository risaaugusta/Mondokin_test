<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('santri_id');
            $table->date('pay_date')->nullable();
            $table->enum('status', ['unpaid', 'paid', 'confirmed'])->default('unpaid');
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills');
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
        Schema::dropIfExists('bill_transactions');
    }
}
