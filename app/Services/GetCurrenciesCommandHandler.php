<?php

namespace App\Services;

class GetCurrenciesCommandHandler
{
    private $currencies;
    
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencies = $currencyRepository->findAll();
    }
    
    public function handle(): array
    {
        return $this->currencies;
    }
}
