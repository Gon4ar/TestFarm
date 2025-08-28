<?php

namespace App\Service\AnimalType;

use App\Models\Product\AnimalProductInterface;
use App\Models\Product\ProductEgg;

class ChickenType implements AnimalTypeInterface, HarvestableTypeInterface
{
    public function produceProduct(int $days): AnimalProductInterface
    {
        $product = new ProductEgg();
        $quantity = 0;
        for ($i = 0; $i < $days; $i++) {
            $quantity += rand(0, 1);
        }

        $product->setQuantity($quantity);

        return $product;
    }
}