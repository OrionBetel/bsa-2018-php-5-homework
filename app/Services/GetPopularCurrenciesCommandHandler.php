<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler
{
    const POPULAR_COUNT = 3;

    private $currencies;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencies = $currencyRepository->findAll();
    }

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencies = $this->currencies;

        usort($currencies, function ($firstCurrency, $secondCurrency)
        {
            return $firstCurrency->getPrice() <=> $secondCurrency->getPrice();
        });

        $currencies = array_reverse($currencies);
        
        $currencies = array_slice($currencies, 0, $count);

        return $currencies;
    }
 
}
