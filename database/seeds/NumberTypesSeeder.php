<?php

use Illuminate\Database\Seeder;

class NumberTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('number_types')->insert([
        ['id' => 1, 'description' => 'Imóveis Disponíveis'],
        ['id' => 2, 'description' => 'Imóveis Vendidos'],
        ['id' => 3, 'description' => 'Imóveis Alugados'],
      ]);
    }
}
