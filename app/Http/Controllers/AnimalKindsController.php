<?php

namespace App\Http\Controllers;

use App\Exceptions\AnimalNotFoundException;
use App\Models\Animal;
use App\Models\AnimalKind;

class AnimalKindsController extends Controller
{
    public function index()
    {
        return response(AnimalKind::all());
    }

    public function getAnimalByKind(int $kindId)
    {
        if (!$animal = Animal::firstWhere('kind_id', $kindId)) {
            throw new AnimalNotFoundException();
        }

        return response([
            'name' => $animal->name,
            'kind' => $animal->animalkind->kind,
            'age'  => $animal->age,
            'size' => $animal->size
        ]);
    }
}
