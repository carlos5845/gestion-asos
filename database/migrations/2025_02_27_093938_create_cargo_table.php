<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->unsignedBigInteger('idcargo')->autoIncrement(); // Corregido
            $table->string('tipo_cargo', 45);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cargo');
    }
};
