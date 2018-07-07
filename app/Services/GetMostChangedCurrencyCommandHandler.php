<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler
{
    private $currencies;
    
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencies = $currencyRepository->findAll();
    }
    
    public function handle(): Currency
    {        
        $currencies = $this->currencies;

        $maxDailyChangePercent = PHP_INT_MIN;
        $mostChangedCurrencyIndex;

        foreach ($currencies as $index => $currency) {
            if ($currency->getDailyChangePercent() > $maxDailyChangePercent) {
                $mostChangedCurrencyIndex = $index;
            }
        }

        return $currencies[$mostChangedCurrencyIndex];
    }
}
