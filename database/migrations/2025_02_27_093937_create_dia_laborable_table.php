<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dia_laborable', function (Blueprint $table) {
            $table->unsignedBigInteger('iddia_laborable')->autoIncrement(); // Corregido
            $table->string('dia', 35)->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('dia_laborable');
    }
};
