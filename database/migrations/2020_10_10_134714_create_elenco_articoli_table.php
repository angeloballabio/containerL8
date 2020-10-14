<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElencoArticoliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elenco_articoli', function (Blueprint $table) {
            $table->id();
            $table->string('descrizione_uk',255)->nullable();
            $table->string('descrizione_it',255)->nullable();
            $table->string('voce_doganale',12)->nullable();
            $table->decimal('diritti_doganali',13,3)->default(0.000);
            $table->decimal('val_iva',13,3)->default(0.000);
            $table->decimal('aliquota_iva',2,1)->default(0.0);
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
            $table->bigInteger('fornitore_id')->default(0);
            $table->string('codice_articolo',20)->nullable();
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
        Schema::dropIfExists('elenco_articoli');
    }
}
