<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('junta_directiva', function (Blueprint $table) {
            $table->id('idjunta_directiva');
            $table->string('socio_dni', 8);
            $table->string('nom_apellido', 55);
            $table->unsignedBigInteger('cargo_idcargo'); // Tipo de dato corregido
            $table->foreign('cargo_idcargo')->references('idcargo')->on('cargo')->onDelete('cascade'); // Clave foránea corregida
            $table->string('celular', 9)->nullable();
            $table->unsignedBigInteger('grupo_idgrupo');
            $table->foreign('grupo_idgrupo')->references('idgrupo')->on('grupo')->onDelete('cascade')->unique();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('junta_directiva');
    }
};
