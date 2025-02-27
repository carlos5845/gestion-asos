<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('socio', function (Blueprint $table) {
            $table->id('idsocio');
            $table->string('dni', 8)->unique();
            $table->string('nombre', 45);
            $table->string('apellido_pat', 45);
            $table->string('apellido_mat', 45)->nullable();
            $table->string('departamento', 45);
            $table->string('provincia', 45);
            $table->string('distrito', 45)->nullable();
            $table->unsignedBigInteger('grupo_idgrupo'); // Tipo de dato corregido
            $table->foreign('grupo_idgrupo')->references('idgrupo')->on('grupo')->onDelete('cascade'); // Referencia corregida
            $table->string('cod_puesto', 7)->nullable();
            $table->string('rubro', 75);
            $table->boolean('estado');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('socio');
    }
};
