<?php

namespace App\Models\Animal;

use App\Service\AnimalType\ChickenType;

class Chicken extends AbstractAnimal
{
    public function getTypeClassName(): string
    {
        return ChickenType::class;
    }
}
