<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'kind_id'
    ];

    public function animalkind()
    {
        return $this->belongsTo(AnimalKind::class, 'kind_id', 'id');
    }
}
