<?php

namespace App\Service\Print;

use App\Models\Animal\Chicken;
use App\Models\Animal\Cow;
use App\Models\Farm;
use App\Models\Product\ProductEgg;
use App\Models\Product\ProductMilk;
use Illuminate\Support\Collection;

class FarmPrint
{
    public function printFarmAnimals(Farm $farm): string
    {
        $return = "Количество животных на ферме:\n";

        $animals = $farm->getAnimals();
        
        $count = $animals->filter(function ($animal) {
            return $animal instanceof Cow;
        })->count();
        $return .= "Коров: {$count}\n";

        $count = $animals->filter(function ($animal) {
            return $animal instanceof Chicken;
        })->count();
        $return .= "Кур: {$count}\n";

        return $return;
    }

    public function printProducts(Collection $products): string
    {
        $return = "Продуктов на ферме:\n";

        if ($products->has(ProductMilk::class)) {
            $return .= "Молока: ". $products->get(ProductMilk::class)->getQuantity() . "л.\n";
        }

        if ($products->has(ProductEgg::class)) {
            $return .= "Яиц: ". $products->get(ProductEgg::class)->getQuantity() . "шт.\n";
        }

        return $return;
    }
}