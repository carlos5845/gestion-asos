<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('vigencia_poder', function (Blueprint $table) {
            $table->id('idvigencia_poder');
            $table->string('partida_registral', 8)->unique();
            $table->string('archivo_vigencia', 255)->nullable();
            $table->unsignedBigInteger('grupo_idgrupo'); // Tipo de dato corregido
            $table->foreign('grupo_idgrupo')->references('idgrupo')->on('grupo')->onDelete('cascade'); // Clave foránea corregida
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('vigencia_poder');
    }
};
