<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatturaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fattura_data', function (Blueprint $table) {
            $table->id();
            $table->string('uk_descrizione', 255)->nullable();
            $table->string('it_descrizione', 255)->nullable();
            $table->string('codice_prodotto', 40)->nullable();
            $table->decimal('peso_lordo',16,2)->default(0.0);
            $table->decimal('peso_netto',16,2)->default(0.0);
            $table->integer('pezzi')->default(0);
            $table->integer('colli')->default(0);
            $table->decimal('prezzo_unitario', 16,2)->default(0.0);
            $table->decimal('prezzo_totale',16,2)->default(0.0);
            $table->string('unita_misura', 10)->nullable();
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
        Schema::dropIfExists('fattura_data');
    }
}
