<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCarreraTable extends Migration
{
    public function up()
    {
        Schema::create('tb_carrera', function (Blueprint $table) {
            $table->id('id_carrera');
            $table->string('nombre');
            $table->enum('activo', ['si', 'no'])->default('si');
            $table->unsignedBigInteger('id_universidad');
            $table->foreign('id_universidad')->references('id_universidad')->on('tb_universidad')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_carrera');
    }
}
