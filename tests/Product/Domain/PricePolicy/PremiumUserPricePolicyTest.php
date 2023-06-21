<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain\PricePolicy;

use App\Product\Domain\PricePolicy\PremiumUserPricePolicy;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class PremiumUserPricePolicyTest extends TestCase
{

    public function testShouldCalculatePrice(): void
    {
        // Expected
        $expectedPrice = 174.99;

        // Given
        $policy = new PremiumUserPricePolicy();

        // When
        $price = $policy->calculate(new Price(200));

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }
}
