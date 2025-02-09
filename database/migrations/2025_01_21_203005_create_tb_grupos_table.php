<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGruposTable extends Migration
{
    public function up()
    {
        Schema::create('tb_grupos', function (Blueprint $table) {
            $table->id('id_grupo');
            $table->string('nombre');
            $table->string('clave')->unique();
            $table->enum('activo', ['si', 'no'])->default('si');
            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id_carrera')->on('tb_carrera')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_grupos');
    }
}
