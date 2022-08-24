<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalKind extends Model
{
    use HasFactory;

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

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
