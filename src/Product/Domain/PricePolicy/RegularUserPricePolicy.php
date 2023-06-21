<?php

declare(strict_types=1);

namespace App\Product\Domain\PricePolicy;

use App\Product\Domain\Exception\PriceIsOutOfRange;
use App\Product\Domain\PricePolicy;
use App\Product\Domain\ValueObject\Price;

final class RegularUserPricePolicy implements PricePolicy
{
    public const REGULAR_USER_RATIO = 1.03;

    /**
     * @throws PriceIsOutOfRange
     */
    public function calculate(Price $basePrice): Price
    {
        return $basePrice->multiply(self::REGULAR_USER_RATIO);
    }
}
