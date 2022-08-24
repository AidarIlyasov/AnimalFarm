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
            'age'  => random_int(1, $animalKinds['cat']->max_age),
            'size' => random_int(1, $animalKinds['cat']->max_size),
            'kind_id' => 1
        ];

        $lucy = [
            'name' => 'Lucy',
            'age'  => random_int(1, $animalKinds['dog']->max_age),
            'size' => random_int(1, $animalKinds['dog']->max_size),
            'kind_id' => 2
        ];

        $stephan = [
            'name' => 'Stephan',
            'age'  => random_int(1, $animalKinds['pigeon']->max_age),
            'size' => random_int(1, $animalKinds['pigeon']->max_size),
            'kind_id' => 3
        ];

        $basil = [
            'name' => 'Basil',
            'age'  => random_int(1, $animalKinds['mouse']->max_age),
            'size' => random_int(1, $animalKinds['mouse']->max_size),
            'kind_id' => 4
        ];

        Animal::insert([$simon, $lucy, $stephan, $basil]);
    }
}
