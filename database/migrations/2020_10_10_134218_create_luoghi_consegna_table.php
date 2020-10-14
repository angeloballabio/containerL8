<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuoghiConsegnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luoghi_consegna', function (Blueprint $table) {
            $table->id();
            $table->string('soprannome',40)->nullable();
            $table->string('nome',255)->nullable();
            $table->string('indirizzo',255)->nullable();
            $table->string('cap',20)->nullable();
            $table->string('luogo',128)->nullable();
            $table->string('provincia',3)->nullable();
            $table->string('numero',5)->nullable();
            $table->string('stato',100)->nullable();
            $table->string('telefono1',30)->nullable();
            $table->string('telefono2',30)->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('fax',30)->nullable();
            $table->string('mail',100)->nullable();
            $table->string('piva',20)->nullable();
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
        Schema::dropIfExists('luoghi_consegna');
    }
}
