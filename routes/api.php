<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalKindsController;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('animal_kinds', [AnimalKindsController::class, 'index']);
Route::post('animals', [AnimalController::class, 'create']);
Route::get('/animals/{name}', [AnimalController::class, 'show']);
Route::post('/animals/age', [AnimalController::class, 'growAnimal']);
Route::get('/kinds/{kindId}/animal/', [AnimalKindsController::class, 'getAnimalByKind']);
