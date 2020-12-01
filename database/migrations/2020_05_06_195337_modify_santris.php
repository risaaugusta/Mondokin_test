<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySantris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santris', function (Blueprint $table) {
            $table->dropColumn('live_status');
            $table->foreignId('pesantren_type_id')->nullable();
            $table->foreign('pesantren_type_id')->references('id')->on('pesantren_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('santris', function (Blueprint $table) {
            $table->string('live_status');
            $table->dropColumn('pesantren_type_id');
        });
    }
}
