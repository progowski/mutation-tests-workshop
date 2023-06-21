<?php

declare(strict_types=1);

namespace App\Product\Domain\Service;

use App\Product\Domain\PricePolicy;
use App\Product\Domain\Product;

final class PriceService
{
    public function __construct(private PricePolicy $pricePolicy)
    {
    }

    public function calculatePrice(Product $product): Product
    {
        if ($product->isBrandOdd()) {
            return $product;
        }

        $calculatedPrice = $this->pricePolicy->calculate($product->getBasePrice());

        return Product::withNewPrice($product, $calculatedPrice);
    }
}
