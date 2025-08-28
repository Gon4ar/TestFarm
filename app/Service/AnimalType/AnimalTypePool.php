<?php

namespace App\Service\AnimalType;

use App\Models\Animal\AnimalInterface;

class AnimalTypePool
{
    private $pool;

    public function __construct(
        CowType $cowType,
        ChickenType $chickenType,
    )
    {
        $this->pool = [
            CowType::class => $cowType,
            ChickenType::class => $chickenType,
        ];
    }

    public function getTypeByAnimal(AnimalInterface $animal): AnimalTypeInterface
    {
        return $this->pool[$animal->getTypeClassName()];
    }
}