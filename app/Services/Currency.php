<?php

namespace App\Services;

class Currency
{
    private $id;
    private $name;
    private $price;
    private $imageUrl;
    private $dailyChangePercent;

    public function __construct(int    $id,
                                string $name,
                                float  $price, 
                                string $imageUrl, 
                                float  $dailyChangePercent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
        $this->dailyChangePercent = $dailyChangePercent;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getDailyChangePercent(): float
    {
        return $this->dailyChangePercent;
    }
}
