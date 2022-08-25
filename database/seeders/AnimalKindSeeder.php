<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnimalKind;

class AnimalKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = [
            'kind' => 'cat',
            'max_size' => 34,
            'max_age' => 15,
            'growth_factor' => 1.3
        ];

        $dog = [
            'kind' => 'dog',
            'max_size' => 56,
            'max_age' => 20,
            'growth_factor' => 1.5
        ];

        $pigeon = [
            'kind' => 'pigeon',
            'max_size' => 16,
            'max_age' => 6,
            'growth_factor' => 2.0
        ];

        $mouse = [
            'kind' => 'mouse',
            'max_size' => 7,
            'max_age' => 2,
            'growth_factor' => 3.2
        ];

        AnimalKind::insert([$cat, $dog, $pigeon, $mouse]);
    }
}
