<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('padron_socios', function (Blueprint $table) {
            $table->id('idpadron_socios');
            $table->string('archivo_padron', 255)->nullable();
            $table->unsignedBigInteger('grupo_idgrupo'); // Tipo de dato corregido
            $table->foreign('grupo_idgrupo')->references('idgrupo')->on('grupo')->onDelete('cascade'); // Clave foránea corregida
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('padron_socios');
    }
};
