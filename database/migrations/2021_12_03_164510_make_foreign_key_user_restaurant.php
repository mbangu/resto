<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeForeignKeyUserRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant', function (Blueprint $table) {
            // $table->unsignedBigInteger('iduser_restaurant');

            // $table->foreign('iduser_restaurant')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant', function (Blueprint $table) {
            //
        });
    }
}
