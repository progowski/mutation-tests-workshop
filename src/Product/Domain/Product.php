<?php

declare(strict_types=1);

namespace App\Product\Domain;

use App\Product\Domain\Exception\PriceIsOutOfRange;
use App\Product\Domain\ValueObject\Price;

final class Product
{
    public function __construct(
        private Price $basePrice,
        private string $name,
        private int $brand
    ) {

    }

    public static function withNewPrice(Product $product, Price $calculatedPrice): self
    {
        return new self(
            $calculatedPrice,
            $product->name,
            $product->brand
        );
    }

    public function getBasePrice(): Price
    {
        return $this->basePrice;
    }

    public function isBrandOdd(): bool
    {
        return $this->brand % 2 === 1;
    }

    /**
     * @throws PriceIsOutOfRange
     */
    public function applyDiscountCode(): void
    {
        if ($this->isBrandOdd()) {
            $this->basePrice = $this->basePrice->multiply(0.9);
        }
    }
}
