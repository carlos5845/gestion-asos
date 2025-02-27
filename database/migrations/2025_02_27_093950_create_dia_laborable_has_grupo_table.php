<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dia_laborable_has_grupo', function (Blueprint $table) {
            $table->unsignedBigInteger('dia_laborable_iddia_laborable'); // Tipo de dato corregido
            $table->foreign('dia_laborable_iddia_laborable', 'fk_dia_grupo_dia')
                ->references('iddia_laborable')->on('dia_laborable')->onDelete('cascade'); // Clave foránea corregida

            $table->unsignedBigInteger('grupo_idgrupo'); // Tipo de dato corregido
            $table->foreign('grupo_idgrupo', 'fk_dia_grupo_grupo')
                ->references('idgrupo')->on('grupo')->onDelete('cascade'); // Clave foránea corregida

            $table->timestamps();
            $table->primary(['dia_laborable_iddia_laborable', 'grupo_idgrupo']); // Clave primaria compuesta
        });
    }
    public function down()
    {
        Schema::dropIfExists('dia_laborable_has_grupo');
    }
};
