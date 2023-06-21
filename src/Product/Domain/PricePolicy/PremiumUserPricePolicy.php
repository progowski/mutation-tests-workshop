<?php

declare(strict_types=1);

namespace App\Product\Domain\PricePolicy;

use App\Product\Domain\Exception\PriceIsOutOfRange;
use App\Product\Domain\PricePolicy;
use App\Product\Domain\ValueObject\Price;

final class PremiumUserPricePolicy implements PricePolicy
{
    private const PREMIUM_USER_RATIO = 0.87;
    private const PSYCHOLOGY_PRICE_TRAP = 0.99;

    /**
     * @throws PriceIsOutOfRange
     */
    public function calculate(Price $basePrice): Price
    {
        if ($basePrice->toFloat() <= 100) {
            return $basePrice->add(self::PSYCHOLOGY_PRICE_TRAP);
        }

        return $basePrice->multiply(self::PREMIUM_USER_RATIO)->add(self::PSYCHOLOGY_PRICE_TRAP);
    }
}
