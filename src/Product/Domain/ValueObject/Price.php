<?php

declare(strict_types=1);

namespace App\Product\Domain\ValueObject;

use App\Product\Domain\Exception\PriceIsOutOfRange;

final class Price
{
    private const MAX_PRODUCT_PRICE = 1000000.;

    /**
     * @throws PriceIsOutOfRange
     */
    public function __construct(private float $value)
    {
        if ($this->value <= 0. || $this->value > self::MAX_PRODUCT_PRICE) {
            throw new PriceIsOutOfRange($this->value);
        }
    }

    /**
     * @throws PriceIsOutOfRange
     */
    public function multiply(float $multiplicand): self
    {
        return new self(round($this->value * $multiplicand, 2));
    }

    /**
     * @throws PriceIsOutOfRange
     */
    public function add(float $summand): self
    {
        return new self($this->value + $summand);
    }

    /**
     * @throws PriceIsOutOfRange
     */
    public function divide(float $divisor): self
    {
        if ($divisor === 0.) {
            throw new \InvalidArgumentException("Divisor cannot be 0");
        }
        return new self(round($this->value / $divisor, 2));
    }

    public function toFloat(): float
    {
        return $this->value;
    }
}
