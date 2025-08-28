<?php

namespace App\Models\Product;

use App\Enum\Measure;

interface AnimalProductInterface
{
    public function getMeasure(): Measure;

    public function add(AnimalProductInterface $product): self;
}