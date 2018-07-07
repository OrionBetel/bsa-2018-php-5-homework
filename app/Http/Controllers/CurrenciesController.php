<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\CurrencyPresenter;

class CurrenciesController extends Controller
{
    public function getCurrencies()
    {
        $repo = app(CurrencyRepositoryInterface::class);
        $hanler = new GetCurrenciesCommandHandler($repo);
        $currencies = $hanler->handle();

        $formattedCurrencies = [];

        foreach ($currencies as $currency) {
            $formattedCurrencies[] = CurrencyPresenter::present($currency);
        }

        return response()->json($formattedCurrencies);
    }

    public function getUnstableCurrency()
    {
        $repo = app(CurrencyRepositoryInterface::class);
        $hanler = new GetMostChangedCurrencyCommandHandler($repo);
        $unstableCurrency = $hanler->handle();
        $formattedUnstableCurrency = CurrencyPresenter::present($unstableCurrency);

        return response()->json($formattedUnstableCurrency);
    }
}
