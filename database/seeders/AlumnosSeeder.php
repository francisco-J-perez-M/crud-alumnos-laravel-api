<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlumnosSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $grupos = DB::table('tb_grupos')->get();

        foreach ($grupos as $grupo) {
            for ($i = 1; $i <= 100; $i++) {
                DB::table('alumno')->insert([
                    'matricula' => strtoupper($faker->unique()->bothify('???###')),
                    'nombre' => $faker->firstName,
                    'app' => $faker->lastName,
                    'apm' => $faker->lastName,
                    'fn' => $faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
                    'genero' => $faker->randomElement(['M', 'F']),
                    'id_grupo' => $grupo->id_grupo,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
