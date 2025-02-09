<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUniversidadTable extends Migration
{
    public function up()
    {
        Schema::create('tb_universidad', function (Blueprint $table) {
            $table->id('id_universidad');
            $table->string('nombre');
            $table->string('clave')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_universidad');
    }
}
