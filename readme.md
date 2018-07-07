Binary Studio Academy PHP 2018
====

### Домашнее задание Laravel introduction

#### Требования

Ознакомиться с фреймворком, поработать с сервис-контейнером и архитектурой в целом. 
Ознакомиться с механизмом инициализации(bootstrap) и обработки реквеста пользователя.
Ознакомиться с тестовым окружением в Laravel.

#### Установка

Установка показана в рабочем окружении OS Linux:

```
git clone git@github.com:BinaryStudioAcademy/bsa-2018-php-5.git
cd project-dir
composer install
cp .env.example .env
php artisan key:generate
```

Также рекомендуется использовать Homestead для поднятия приложения.

#### Задания

##### Задание 1

* Реализовать класс `Currency`.
* Реализовать класс `CurrencyGenerator`.
* Реализовать интерфейс `CurrencyRepositoryInterface` и зарегистрировать в сервис контейнере Laravel.
* Реализовать класс `GetCurrenciesCommandHandler` и вернуть список криптовалют.
* Реализовать класс `GetPopularCurrenciesCommandHandler` и вернуть список из 3-х наиболее дорогих криптовалют, 
отсортированных по убыванию цены.
* Реализовать класс `GetMostChangedCurrencyCommandHandler` и вернуть валюту, стоимось которой меняется цене чаще других.

Данные можно взять с сайта [https://coinmarketcap.com/](https://coinmarketcap.com/).

##### Задание 2
* Реализовать класс `CurrencyPresenter`.

* Реализовать маршрут `api/currencies` в файле `routes/api.php` 
    * получить список всех криптовалют в формате json 

* Реализовать маршрут `api/currencies/unstable` в файле `routes/api.php` 
    * получить наиболее меняющуюся в цене криптовалюту в формате json 

* Реализовать маршрут `/currencies/popular` в файле `routes/web.php`
    * получить список из 3-х самых дорогих криптовалют и отрендерить во view `popular_currencies.blade.php` 
 
#### Проверка

Cвои решения можно проверить запустив тесты PHPUnit.

Все тесты:

```
./vendor/bin/phpunit
```

Или тест для каждого задания в отдельности  

```
./vendor/bin/phpunit --testsuite task1
```

#### Приём решений

Ваше решение необходимо разместить в отдельном репозитории на Github или Bitbucket и прислать ссылку на него.
