<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('resolucion_gdh', function (Blueprint $table) {
            $table->id('idresolucion_gdh');
            $table->string('num_resolucion', 45)->unique();
            $table->date('fecha_emision');
            $table->string('archivo_gdh', 255)->nullable();
            $table->unsignedBigInteger('grupo_idgrupo'); // Tipo de dato corregido
            $table->foreign('grupo_idgrupo')->references('idgrupo')->on('grupo')->onDelete('cascade'); // Clave foránea corregida
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('resolucion_gdh');
    }
};
