<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePezziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pezzi', function (Blueprint $table) {
            $table->id();
            $table->integer('pezzi')->unsigned()->default(0);
            $table->integer('colli')->unsigned()->default(0);
            $table->decimal('lordo',16,3)->default(0.000);
            $table->decimal('netto',16,3)->default(0.000);
            $table->decimal('valore',16,3)->default(0.000);
            $table->string('codice_articolo',20)->nullable();
            $table->bigInteger('articolo_id')->unsigned()->default(0);
            $table->bigInteger('ordine_id')->unsigned()->default(0);
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
        Schema::dropIfExists('pezzi');
    }
}
