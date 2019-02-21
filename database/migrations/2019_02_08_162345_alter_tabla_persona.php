<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablaPersona extends Migration
{
    public function up()
    {
        Schema::table('persona', function (Blueprint $table) {
            $table->integer("grupo")->unsigned();
            $table->foreign('grupo')->references('idG')->on('grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persona', function (Blueprint $table) {
             $table->dropForeign('grupo');
        });
    }
}
