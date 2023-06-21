<?php

declare(strict_types=1);

namespace App\Tests\Product\Domain\Service;

use App\Product\Domain\PricePolicy\PremiumUserPricePolicy;
use App\Product\Domain\Product;
use App\Product\Domain\Service\PriceService;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

final class PriceServiceTest extends TestCase
{
    public function testShouldCheckIfPriceIsCalculatingCorrectly(): void
    {
        // Expect
        $expectedPrice = 218.66;

        // Given
        $product = new Product(new Price(250.20), 'Test Product', 2);
        $service = new PriceService(new PremiumUserPricePolicy());

        // When
        $calculatedProduct = $service->calculatePrice($product);

        // Then
        self::assertSame($expectedPrice, $calculatedProduct->getBasePrice()->toFloat());
    }

    public function testShouldCheckIfProductWithOddBrandIsNotCalculating(): void
    {
        // Given
        $product = new Product(new Price(101.), 'Test Product', 1);
        $service = new PriceService(new PremiumUserPricePolicy());

        // When
        $calculatedProduct = $service->calculatePrice($product);

        // Then
        self::assertSame($product, $calculatedProduct);
    }
}
