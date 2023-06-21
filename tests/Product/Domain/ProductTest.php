<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain;

use App\Product\Domain\Product;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testShould(): void
    {
        // Given
        $product = new Product(new Price(250.20), 'Test Product', 2);

        // When
        $price = $product->getBasePrice();

        // Then
        self::assertSame(250.20, $price->toFloat());
    }
}
