<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UniversidadesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('tb_universidad')->insert([
            ['nombre' => $faker->company . ' Universidad', 'clave' => $faker->unique()->regexify('[A-Z]{2}'), 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => $faker->company . ' Universidad', 'clave' => $faker->unique()->regexify('[A-Z]{2}'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
