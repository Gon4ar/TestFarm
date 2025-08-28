<?php

namespace App\Service\Factory;

use App\Models\Animal\AnimalInterface;
use App\Models\Farm;
use App\Service\AnimalType\AnimalTypePool;
use LogicException;

class FarmFactory
{
    public function __construct(
        private readonly AnimalTypePool $animalTypePool,
    )
    {
        
    }

    public function createFarm()
    {
        $return = new Farm();
        $return->setDependencies($this->animalTypePool);

        return $return;
    }
}