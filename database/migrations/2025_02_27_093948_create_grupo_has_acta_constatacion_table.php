<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('grupo_has_acta_constatacion', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_idgrupo');
            $table->unsignedBigInteger('acta_constatacion_idacta_constatacion');
            $table->date('fecha_acta');
            $table->string('archivo_acta', 255)->nullable();
            $table->timestamps();

            // Definiendo claves primarias compuestas
            $table->primary(['grupo_idgrupo', 'acta_constatacion_idacta_constatacion']);

            // Agregando claves foráneas con nombres personalizados
            $table->foreign('grupo_idgrupo', 'fk_grupo_acta_grupo')
                ->references('idgrupo')->on('grupo')->onDelete('cascade');

            $table->foreign('acta_constatacion_idacta_constatacion', 'fk_grupo_acta_constatacion')
                ->references('idacta_constatacion')->on('acta_constatacion')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('grupo_has_acta_constatacion');
    }
};
