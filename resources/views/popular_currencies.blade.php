<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Popular Currencies</title>

        <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
          crossorigin="anonymous">
    </head>
    <body>
        <h1 class="display-4 text-center">Top 3 Popular Cryptocurrencies</h1>
        
        <table class="table table-striped" style="width:500px; margin:25px auto 0;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price, USD</th>
                    <th scope="col">Daily change, %</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $index => $currency)
                    <tr>
                        <td>
                            <span>{{ ++$index }}</span>
                        </td>
                        <td>
                            <img src="{{ $currency['img'] }}" alt="{{ $currency['name'] }}">
                            <span>{{ $currency['name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $currency['price'] }}</span>
                        </td>
                        <td>
                            <span>{{ $currency['daily_change'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
