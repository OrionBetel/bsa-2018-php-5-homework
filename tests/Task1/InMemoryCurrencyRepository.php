<?php

namespace Tests\Task1;

use App\Services\Currency;
use App\Services\CurrencyRepositoryInterface;

class InMemoryCurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @return Currency[]
     */
    public function findAll(): array
    {
        return $this->currencies;
    }
}