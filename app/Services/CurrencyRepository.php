<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;
    
    /**
     * @param Currency[]
     */
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
