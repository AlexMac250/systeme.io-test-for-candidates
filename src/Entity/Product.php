<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Interface\ResourceInterface;
use App\Entity\Trait\ResourceTrait;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: 'products')]
class Product implements ResourceInterface
{
    use ResourceTrait;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column]
    private float $price;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
