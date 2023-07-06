<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain\PricePolicy;

use App\Product\Domain\PricePolicy\PremiumUserPricePolicy;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class PremiumUserPricePolicyTest extends TestCase
{
    /**
     * @dataProvider priceDataProvider
     */
    public function testShouldCalculatePrice(float $price, float $expectedPrice): void
    {
        // Given
        $policy = new PremiumUserPricePolicy();

        // When
        $price = $policy->calculate(new Price($price));

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }

    public function priceDataProvider(): array
    {
        return [
            [100, 100.99],
            [90, 90.99],
            [200, 174.99],
            [300, 261.99],
            [400, 348.99]
        ];
    }
}
