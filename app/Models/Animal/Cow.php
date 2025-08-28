<?php

namespace App\Models\Animal;

use App\Service\AnimalType\CowType;

class Cow extends AbstractAnimal
{
    public function getTypeClassName(): string
    {
        return CowType::class;
    }
}
