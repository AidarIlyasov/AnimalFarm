<?php

namespace App\Exceptions;

use Exception;

class AnimalNotFoundException extends Exception
{
    public function render()
    {
        return response([
            'error' => 'Wrong animal name was passed',
            'data' => null
        ], 500);
    }
}
