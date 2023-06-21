<?php

declare(strict_types=1);

namespace App\Product\Domain\Exception;

use JetBrains\PhpStorm\Pure;

final class PriceIsOutOfRange extends \Exception
{
    public function __construct(float $price)
    {
        parent::__construct(sprintf('Price %s is out of range', $price));
    }

}
