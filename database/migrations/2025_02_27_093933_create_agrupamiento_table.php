<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agrupamiento', function (Blueprint $table) {
            $table->unsignedBigInteger('idagrupamiento')->autoIncrement(); // Corregido
            $table->string('cod_etiqueta', 15)->unique();
            $table->string('agrupamientocol', 45);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('agrupamiento');
    }
};
