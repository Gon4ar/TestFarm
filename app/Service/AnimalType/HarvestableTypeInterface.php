<?php

namespace App\Service\AnimalType;

use App\Models\Product\AnimalProductInterface;

interface HarvestableTypeInterface
{
    public function produceProduct(int $days): AnimalProductInterface;
}