<?php

namespace App\Services;

class CurrencyGenerator
{
    const CURRENCY_URL = 'https://api.coinmarketcap.com/v2/ticker/?structure=array';
    const IMAGE_URL_START = 'https://s2.coinmarketcap.com/static/img/coins/16x16/';
    
    public static function generate(): array
    {
        $currencies = [];
        
        $data = static::fetchCurrencies();

        foreach ($data as $item) {
            $currency = new Currency($item->id,
                                     $item->name,
                                     $item->quotes->USD->price,
                                     static::IMAGE_URL_START . $item->id . '.png',
                                     $item->quotes->USD->percent_change_24h);
            
            $currencies[] = $currency;
        }

        return $currencies;
    }
    
    // This function returns only 100 currencies. Ideally there must be all available currencies.
    private static function fetchCurrencies(): array
    {
        $output = file_get_contents(static::CURRENCY_URL);
        $currencies = json_decode($output);
        $currencies = $currencies->data;

        return $currencies;
    }
}
