<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GruposSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $carreras = DB::table('tb_carrera')->get();

        foreach ($carreras as $carrera) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('tb_grupos')->insert([
                    'nombre' => "Grupo " . $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                    'clave' => $carrera->id_carrera . "-G$i-" . uniqid(), // Clave única usando uniqid
                    'activo' => 'si',
                    'id_carrera' => $carrera->id_carrera,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
