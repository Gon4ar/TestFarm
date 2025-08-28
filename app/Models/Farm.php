<?php

namespace App\Models;

use App\Models\Animal\AnimalInterface;
use App\Models\Product\AnimalProductInterface;
use App\Service\AnimalType\AnimalTypePool;
use App\Service\AnimalType\HarvestableTypeInterface;
use Illuminate\Support\Collection;

class Farm
{
    private Collection $animals;
    private AnimalTypePool $animalTypePool;

    public function __construct()
    {
        $this->animals = new Collection();
    }

    public function setDependencies(
        AnimalTypePool $animalTypePool,
    )
    {
        $this->animalTypePool = $animalTypePool;
    }

    public function addAnimal(AnimalInterface $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
        };

        return $this;
    }

    public function removeAnimal(AnimalInterface $animal): self
    {
        if ($this->animals->contains($animal)) {
            
        };

        return $this;
    }

    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function gatherAnimalProduct(int $days): Collection
    {
        $products = new Collection();
        
        foreach ($this->animals as $animal) {
            $type = $this->animalTypePool->getTypeByAnimal($animal);
            if ($type instanceof HarvestableTypeInterface) {
                $product = $type->produceProduct($days);
                $this->addProductToCollection($products, $product);
            }
        }

        return $products;
    }

    private function addProductToCollection(Collection $products, AnimalProductInterface $product)
    {
        $class = get_class($product);

        if ($products->has($class)) {
            $products->get($class)->add($product);
        } else {
            $products->put($class, $product);
        }
    }
}