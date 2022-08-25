<?php

namespace App\Http\Controllers;

use App\Exceptions\AnimalNotFoundException;
use App\Http\Requests\AnimalCreateRequest;
use App\Http\Requests\AnimalGrowRequest;
use App\Models\AnimalKind;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function create(AnimalCreateRequest $request)
    {
        $kind = AnimalKind::firstWhere('kind', $request->kind);

        $animal = Animal::create([
            'name' => $request->name,
            'kind_id' => $kind->id
        ]);

        $animal->save();

        return response([
            'error' => null,
            'data' => 'ok'
        ]);
    }

    public function show(string $name)
    {
        if (!$animal = Animal::firstWhere('name', $name)) {
            throw new AnimalNotFoundException();
        }

        return response([
            'name' => $animal->name,
            'kind' => $animal->animalkind->kind,
            'age'  => $animal->age,
            'size' => $animal->size
        ]);
    }

    public function growAnimal(AnimalGrowRequest $request)
    {
        $animal = Animal::firstWhere('name', $request->name);

        $animal->age = $animal->animalkind->max_age;
        $animal->size = $animal->animalkind->max_size;
        $animal->save();

        return response([
            'error' => null,
            'data' => 'ok'
        ]);
    }
}
