<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesantrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesantrens', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->enum('accreditation', ['A', 'B', 'C', 'D'])->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('address');
            $table->char('province_id', 2);
            $table->char('regency_id', 4);
            $table->string('phone', 20);
            $table->longText('description')->nullable();
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->boolean('online_registration')->default(false);
            $table->boolean('suspended')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('province_id')->references('id')->on('indoregion_provinces');
            $table->foreign('regency_id')->references('id')->on('indoregion_regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesantrens');
    }
}
