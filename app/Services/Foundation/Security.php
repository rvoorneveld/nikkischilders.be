<?php

namespace App\Services\Foundation;

use Jenssegers\Optimus\Optimus;

class Security
{

    protected $optimus;

    public function __construct()
    {
        $this->optimus = new Optimus(
            env('OPTIMUS_PRIME'),
            env('OPTIMUS_INVERSE'),
            env('OPTIMUS_RANDOM')
        );
    }

    public function encode(int $id): int
    {
        return $this->optimus->encode($id);
    }

}
