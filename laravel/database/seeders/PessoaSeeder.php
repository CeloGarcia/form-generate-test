<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Faker\Generator as Faker;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $count = 0;
        while ($count <= 20) {
            DB::table('pessoas')->insert([
                'nome' => $faker->name(),
                'cpf' => $faker->numerify('###########'),
                'uf' => $faker->randomLetter(2),
                'cidade' => $faker->city(),
                'situacao' => $faker->numberBetween(0, 3),
                'password' => $faker->password(),
            ]);
            $count++;
        }
    }
}
