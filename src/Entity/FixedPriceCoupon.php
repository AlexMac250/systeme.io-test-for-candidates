<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class FixedPriceCoupon extends Coupon
{
    protected function calculatePrice(float $price): float
    {
        return $price > $this->getAmount() ? $price - $this->getAmount() : 0;
    }
}