<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('acta_constatacion', function (Blueprint $table) {
            $table->id('idacta_constatacion');
            $table->string('num_constatacion', 45);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('acta_constatacion');
    }
};
