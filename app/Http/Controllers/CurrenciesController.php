<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use App\Services\CurrencyPresenter;

class CurrenciesController extends Controller
{
    protected $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    public function getCurrencies()
    {
        $handler = new GetCurrenciesCommandHandler($this->repository);
        $currencies = $handler->handle();

        $formattedCurrencies = [];

        foreach ($currencies as $currency) {
            $formattedCurrencies[] = CurrencyPresenter::present($currency);
        }

        return response()->json($formattedCurrencies);
    }

    public function getUnstableCurrency()
    {
        $handler = new GetMostChangedCurrencyCommandHandler($this->repository);
        $unstableCurrency = $handler->handle();

        $formattedUnstableCurrency = CurrencyPresenter::present($unstableCurrency);

        return response()->json($formattedUnstableCurrency);
    }

    public function getPopularCurrencies()
    {
        $handler = new GetPopularCurrenciesCommandHandler($this->repository);
        $popularCurrencies = $handler->handle();

        $formattedCurrencies = [];
        foreach ($popularCurrencies as $currency) {
            $formattedCurrencies[] = CurrencyPresenter::present($currency);
        }

        return view('popular_currencies', ['currencies' => $formattedCurrencies]);
    }
}
