<?php

namespace App\Entity;

use App\Repository\CouponRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\ResourceTrait;
use App\Entity\Interface\ResourceInterface;
use App\Entity\Interface\CouponInterface;

#[ORM\Entity(repositoryClass: CouponRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'coupon_type', type: 'string')]
#[ORM\DiscriminatorMap(['fixed_price' => FixedPriceCoupon::class, 'percentage' => PercentageCoupon::class])]
#[ORM\Table(name: 'coupons')]
abstract class Coupon implements ResourceInterface, CouponInterface
{
    use ResourceTrait;

    #[ORM\Column(length: 7)]
    private string $code;

    #[ORM\Column(type: 'float')]
    private float $amount;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $used = false;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setUsed(bool $used): self
    {
        $this->used = $used;

        return $this;
    }

    public function isUsed(): bool
    {
        return $this->used;
    }

    public function applyCoupon(float $price): float
    {
        $this->setUsed(true);

        return $this->calculatePrice($price);
    }

    abstract protected function calculatePrice(float $price);
}
