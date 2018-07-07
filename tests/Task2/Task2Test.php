<?php

namespace Tests\Task2;

use App\Services\Currency;
use App\Services\CurrencyPresenter;
use Tests\TestCase;

class Task2Test extends TestCase
{
    public function test_currency_presenter()
    {
        $currency = new Currency(
            1,
            'crypto',
            5000.0,
            'url',
            1.5
        );

        $data = CurrencyPresenter::present($currency);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('img', $data);
        $this->assertArrayHasKey('price', $data);
        $this->assertArrayHasKey('daily_change', $data);

        $this->assertEquals(1, $data['id']);
        $this->assertEquals('crypto', $data['name']);
        $this->assertEquals(5000.0, $data['price']);
        $this->assertEquals('url', $data['img']);
        $this->assertEquals(1.5, $data['daily_change']);
    }

    public function test_get_all_currencies()
    {
        $data = $this->json('get', 'api/currencies')
            ->assertHeader('Content-Type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'price',
                    'img',
                    'daily_change'
                ]
            ])
            ->json();

        $this->assertNotEmpty($data);

        foreach ($data as $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('img', $item);
            $this->assertArrayHasKey('price', $item);
            $this->assertArrayHasKey('daily_change', $item);
        }
    }

    public function test_get_unstable_currency()
    {
        $this->json('get', 'api/currencies/unstable')
            ->assertHeader('Content-Type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'price',
                'img',
                'daily_change'
            ]);
    }
}