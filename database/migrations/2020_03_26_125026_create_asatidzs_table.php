<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsatidzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asatidzs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nip')->nullable();
            $table->string('name');
            $table->string('npwp', 25)->unique();
            $table->string('ktp', 25)->unique();
            $table->string('religion');
            $table->enum('gender', ['male', 'female']);
            $table->text('address');
            $table->string('phone', 20);
            $table->string('birthplace');
            $table->date('birthdate');
            $table->text('additional_task')->nullable();
            $table->enum('marriage_status', ['married', 'single']);
            $table->enum('employee_status', ['permanent', 'contract', 'hononary', 'outsource'])->comment('employee status');
            $table->string('photo');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asatidzs');
    }
}
