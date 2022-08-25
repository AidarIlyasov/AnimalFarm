<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalKind extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kind',
        'max_size',
        'max_age',
        'growth_factor'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'kind_id');
    }
}
