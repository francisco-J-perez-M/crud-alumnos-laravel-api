<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id('id_alumno');
            $table->string('matricula', 20)->unique();
            $table->string('nombre', 100);
            $table->string('app', 100);
            $table->string('apm', 100)->nullable();
            $table->date('fn');
            $table->enum('genero', ['M', 'F']);
            $table->unsignedBigInteger('id_grupo'); // Relación con grupos
            $table->foreign('id_grupo')->references('id_grupo')->on('tb_grupos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno');
    }
};
