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
            $table->string('voce_doganale',12)->nullable();
            $table->decimal('diritti_doganali',13,3)->default(0.000);
            $table->decimal('val_iva',13,3)->default(0.000);
            $table->decimal('aliquota_iva',5,1)->default(0.0);
            $table->boolean('acciaio')->default(0);
            $table->boolean('acciaio_inox')->default(0);
            $table->boolean('plastica')->default(0);
            $table->boolean('legno')->default(0);
            $table->boolean('bambu')->default(0);
            $table->boolean('vetro')->default(0);
            $table->boolean('ceramica')->default(0);
            $table->boolean('carta')->default(0);
            $table->boolean('pietra')->default(0);
            $table->boolean('posateria')->default(0);
            $table->boolean('attrezzi_cucina')->default(0);
            $table->boolean('richiede_ce')->default(0);
            $table->boolean('richiede_age')->default(0);
            $table->boolean('richiede_cites')->default(0);
            $table->string('fornitore',40)->nullable();
            $table->bigInteger('operazione')->default(0);
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
