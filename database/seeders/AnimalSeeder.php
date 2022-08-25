<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnimalKind;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animalKinds = AnimalKind::get()->keyBy('kind');

        $simon = [
            'name' => 'Simon',
            'age'  => 1,
            'size' => 1,
            'kind_id' => 1
        ];

        $lucy = [
            'name' => 'Lucy',
            'age'  => 1,
            'size' => 1,
            'kind_id' => 2
        ];

        $stephan = [
            'name' => 'Stephan',
            'age'  => 1,
            'size' => 1,
            'kind_id' => 3
        ];

        $basil = [
            'name' => 'Basil',
            'age'  => 1,
            'size' => 1,
            'kind_id' => 4
        ];

        Animal::insert([$simon, $lucy, $stephan, $basil]);
    }
}
