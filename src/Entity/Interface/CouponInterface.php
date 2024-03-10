<?php

namespace App\Entity\Interface;

interface CouponInterface
{
    public function applyCoupon(float $price);
}