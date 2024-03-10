<?php

namespace App\Entity;

use App\Entity\Coupon;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class PercentageCoupon extends Coupon
{
    protected function calculatePrice(float $price): float
    {
        if ($this->getAmount() <= 0) {
            return $price;
        }

        return $this->getAmount() > 100 ? 0 : $price - $price / 100 * $this->getAmount();
    }
}