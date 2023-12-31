<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain\ValueObject;

use App\Product\Domain\Exception\PriceIsOutOfRange;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    public function testShouldCreateObjectWithCorrectPrice(): void
    {
        // When
        $price = new Price(19.99);

        // Then
        self::assertSame(19.99, $price->toFloat());
    }

    public function testShouldMultiplyPrice(): void
    {
        // Expect
        $expectedPrice = 21.98;

        // Given
        $price = new Price(10.99);

        // When
        $price = $price->multiply(2);

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }

    public function testShouldAddToPrice(): void
    {
        // Expect
        $expectedPrice = 12.99;

        // Given
        $price = new Price(10.99);

        // When
        $price = $price->add(2.);

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }
    public function testShouldDividePrice(): void
    {
        // Expect
        $expectedPrice = 12.99;

        // Given
        $price = new Price(10.);

        // When
        $price = $price->divide(0.77);

        // Then
        self::assertSame($expectedPrice, $price->toFloat());
    }
}
