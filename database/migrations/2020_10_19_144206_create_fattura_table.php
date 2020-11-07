<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fattura', function (Blueprint $table) {
            $table->id();
            $table->string('col1',255)->nullable();
            $table->string('col2',255)->nullable();
            $table->string('col3',255)->nullable();
            $table->string('col4',255)->nullable();
            $table->string('col5',255)->nullable();
            $table->string('col6',255)->nullable();
            $table->string('col7',255)->nullable();
            $table->string('col8',255)->nullable();
            $table->string('col9',255)->nullable();
            $table->string('col10',255)->nullable();
            $table->string('col11',255)->nullable();
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
        Schema::dropIfExists('fattura');
    }
}
