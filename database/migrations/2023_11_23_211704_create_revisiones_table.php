<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            $table->string('fecharev');
            $table->foreignId('id_ordens');
            $table->string('tecnicos');
            $table->string('tipoequip');
            $table->string('marca');
            $table->string('capacidad');
            $table->string('voltajeplacaq');
            $table->string('voltajeconsumoq');
            $table->string('amperajeplaceq');
            $table->string('amperajel1q');
            $table->string('amperajel2q');
            $table->string('amperajel3q');
            $table->string('tempambientec');
            $table->string('tiporefric');
            $table->string('modelevaporc');
            $table->string('serialevaporc');
            $table->string('voltajeplacac');
            $table->string('voltajeconsumoc');
            $table->string('amperajeplacec');
            $table->string('amperajel1c');
            $table->string('amperajel2c');
            $table->string('amperajel3c');
            $table->string('psuccionq');
            $table->string('pdescargaq');
            $table->string('modelcondensaq');
            $table->string('serialcondensaq');
            $table->string('funciona');
            $table->string('cargarefri');
            $table->string('sepertinc');
            $table->string('serpetine');
            $table->string('filtro');
            $table->string('ventiladorc');
            $table->string('ventiladore');
            $table->string('compresor');
            $table->string('tuboescape');
            $table->string('tuboaislado');
            $table->string('tubosoporte');
            $table->string('breakers');
            $table->string('protector');
            $table->string('cableadoe');
            $table->string('lugartrabajo');
            $table->string('notas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
