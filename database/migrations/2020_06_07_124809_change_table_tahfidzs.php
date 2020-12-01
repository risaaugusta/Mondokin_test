<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableTahfidzs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tahfidzs', function (Blueprint $table) {
            $table->dropColumn('pages');
            $table->string('type', 20);
            $table->char('juz', 2);
            $table->char('ayat_first', 3);
            $table->char('ayat_end', 3);
            $table->char('page_first', 10);
            $table->char('page_end', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tahfidzs', function (Blueprint $table) {
            $table->integer('pages');
            $table->dropColumn(['type', 'juz', 'ayat_first', 'ayat_end', 'page_first', 'page_end']);
        });
    }
}
