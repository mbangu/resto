<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIduserRestautantToServeur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('serveur', function (Blueprint $table) {
            // $table->unsignedBigInteger('iduser_serveur')->default(1);
            // $table->foreign('iduser_serveur')->references('id')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('serveur', function (Blueprint $table) {
            //
        });
    }
}
