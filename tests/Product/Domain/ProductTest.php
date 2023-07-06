<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain;

use App\Product\Domain\Product;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testShouldCreateProductPrice(): void
    {
        // Given
        $product = new Product(new Price(250.20), 'Test Product', 2);

        // When
        $price = $product->getBasePrice();

        // Then
        self::assertSame(250.20, $price->toFloat());
    }

    /**
     * @dataProvider brandProvider
     *
     */
    public function testShouldCheckIfBrandIsOdd(int $brand): void
    {
        // Given
        $product = new Product(new Price(250.20), 'Test Product', $brand);

        // When
        $isOdd = $product->isBrandOdd();

        // Then
        self::assertSame($brand % 2 === 1, $isOdd);
    }

    public function testShouldApplyDiscountCode(): void
    {
        // Given
        $product = new Product(new Price(250.20), 'Test Product', 1);

        // When
        $product->applyDiscountCode();

        // Then
        self::assertSame(225.18, $product->getBasePrice()->toFloat());
    }

    public function brandProvider(): array
    {
        return [
            [1],
            [2],
            [3],
            [5],
            [7],
            [9],
        ];
    }
}
