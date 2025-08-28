<?php

namespace App\Service\AnimalType;

use App\Models\Product\AnimalProductInterface;
use App\Models\Product\ProductMilk;

class CowType implements AnimalTypeInterface, HarvestableTypeInterface
{
    public function produceProduct(int $days): AnimalProductInterface
    {
        $product = new ProductMilk();
        $quantity = 0;
        for ($i = 0; $i < $days; $i++) {
            $quantity += rand(8, 12);
        }

        $product->setQuantity($quantity);

        return $product;
    }
}