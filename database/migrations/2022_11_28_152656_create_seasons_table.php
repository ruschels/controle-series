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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyinteger('number'); 
            // nossa coluna com o numero da temporada da serie

            /* uma forma de relacionar
            $table->unsignedBigInteger('series_id');
            //a chave estrangeira que faz referencia ao id da model Series
            // o id original é do tipo unsignedBig
            $table->foreign('series_id')->references('id')->on('series');
            */

            //forma mais facil de relacionar:
            $table->foreignId('series_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('seasons');
    }
};
