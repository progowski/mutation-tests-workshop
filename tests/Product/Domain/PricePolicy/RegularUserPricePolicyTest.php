<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain\PricePolicy;

use App\Product\Domain\PricePolicy\RegularUserPricePolicy;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class RegularUserPricePolicyTest extends TestCase
{
    public function testShouldCalculatePrice(): void
    {
        // Expected
        $expectedPrice = 103.;

        // Given
        $policy = new RegularUserPricePolicy();

        // When
        $price = $policy->calculate(new Price(100));

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }
}
