<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
            $table->unsignedBigInteger('idgrupo')->autoIncrement(); // Corregido
            $table->string('etiqueta_grupo', 7)->unique();
            $table->string('nombre_grupo', 95);
            $table->string('ubicacion', 45);
            $table->unsignedBigInteger('agrupamiento_idagrupamiento');
            $table->foreign('agrupamiento_idagrupamiento')->references('idagrupamiento')->on('agrupamiento')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_idcategoria');
            $table->foreign('categoria_idcategoria')->references('idcategoria')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
};
