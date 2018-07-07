<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;

class CurrenciesController extends Controller
{
    public function getCurrencies()
    {
        $currencies = app(CurrencyRepositoryInterface::class)->findAll();

        $handledCurrencies = [];

        foreach ($currencies as $currency) {
            $handledCurrencies[] = CurrencyPresenter::present($currency);
        }

        return response()->json($handledCurrencies);
    }
}
