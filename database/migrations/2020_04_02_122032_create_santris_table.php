<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{

    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('nis', 15)->nullable();
            $table->string('name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('religion');
            $table->string('postal', 5);
            $table->text('address');
            $table->enum('live_status', ['dormitory', 'round-trip']);
            $table->string('phone', 15);
            $table->string('photo');
            $table->integer('balance')->default(0);
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
}
