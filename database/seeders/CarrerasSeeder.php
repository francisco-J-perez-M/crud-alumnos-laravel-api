<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarrerasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $universidades = DB::table('tb_universidad')->get();

        foreach ($universidades as $universidad) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('tb_carrera')->insert([
                    [
                        'nombre' => $faker->jobTitle,
                        'activo' => 'si',
                        'id_universidad' => $universidad->id_universidad,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ]);
            }
        }
    }
}
