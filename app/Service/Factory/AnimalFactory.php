<?php

namespace App\Service\Factory;

use App\Models\Animal\AnimalInterface;
use LogicException;

class AnimalFactory
{
    public function createAnimalByIdentifier(string $animalClassName, string $identifier)
    {
        $return = new $animalClassName();
        if (!$return instanceof AnimalInterface) {
            throw new LogicException('Invalid class for factory');
        }

        $return->setIdentifier($identifier);

        return $return;
    }
}