<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperazioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operazioni', function (Blueprint $table) {
            $table->id();
            $table->string('nr_fattura',40)->nullable();
            $table->date('data_fattura')->nullable();
            $table->string('nome_fornitore',40)->nullable();
            $table->string('valuta',4)->nullable();
            $table->string('resa',4)->nullable();
            $table->string('numero_pratica',40)->nullable();
            $table->string('compagnia_aeronavale',40)->nullable();
            $table->date('data_arrivo_nave')->nullable();
            $table->string('nome_nave',90)->nullable();
            $table->string('numero_obl',40)->nullable();
            $table->string('container_nr',40)->nullable();
            $table->integer('cartoni')->default(0);
            $table->decimal('lordo_obl',16,3)->default(0.000);
            $table->integer('cubatura')->default(0);
            $table->date('data_carico')->nullable();
            $table->string('destinatario_obl',10)->nullable();
            $table->string('trasportatore',10)->nullable();
            $table->string('consegna',20)->nullable();
            $table->date('data_pratica')->nullable();
            $table->decimal('totale_diritti',16,3)->default(0.000);
            $table->decimal('totale_iva',16,3)->default(0.000);
            $table->boolean('richiede_sanitari')->default(0);
            $table->integer('numero_sanitari')->default(0);
            $table->boolean('richiede_ce')->default(0);
            $table->boolean('richiede_conformita')->default(0);
            $table->boolean('richiede_cites')->default(0);
            $table->string('dogana_t1',40)->nullable();
            $table->string('dogana_sdoganamento',40)->nullable();
            $table->string('magazzino',20)->nullable();
            $table->string('tipo_container',40)->nullable();
            $table->string('sigillo',40)->nullable();
            $table->string('allegati',255)->nullable();
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
        Schema::dropIfExists('operazioni');
    }
}
