<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('formeJuri');
            $table->string('siegeSocial');
            $table->string('capital');
            $table->string('activiteprincipal');
            $table->integer('RC');
            $table->integer('patente');
            $table->integer('IF');
            $table->integer('CNSS');
            $table->integer('ICE');
            $table->integer('RIB');
            $table->date('dateexploitation');
            $table->date('dateDbDexploitatiion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societes');
    }
};
