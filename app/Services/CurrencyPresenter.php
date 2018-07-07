<?php

namespace App\Services;

class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return [
            'id'           => $currency->getId(),
            'name'         => $currency->getName(),
            'price'        => $currency->getPrice(),
            'img'          => $currency->getImageUrl(),
            'daily_change' => $currency->getDailyChangePercent()
        ];
    }
}
