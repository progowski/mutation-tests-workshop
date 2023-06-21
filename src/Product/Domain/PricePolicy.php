<?php

declare(strict_types=1);

namespace App\Product\Domain;

use App\Product\Domain\ValueObject\Price;

interface PricePolicy
{
    public function calculate(Price $basePrice): Price;
}
