<?php

use Article\ArticleCollection;
use Article\ArticleFilterIterator;
use Reader\ArticlesJsonReader;

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('run_app.log', Monolog\Logger::ERROR));

try {
    if ($argc < 3) {
        echo("You should input a command and arguments!");
        exit();
    }
    
    $command = $argv[1];
    $arguments = [];
    for ($i = 2; $i < $argc; $i++) {
        $arguments[$i - 1] = $argv[$i];
    }
    
    $commandsAvailable = [
        'count_by_price_range' => 'checkPriceRange',
        'count_by_vendor_id' => 'checkVendorId'
    ];
    
    $url = 'url_here';

//$json = file_get_contents($url);
    
    $json =
        <<<'JSON'
[
{
"offerId": 123,
"productTitle": "Coffee machine",
"vendorId": 35,
"price": 390.4
},
{
"offerId": 124,
"productTitle": "Napkins",
"vendorId": 35,
"price": 15.5
},
{
"offerId": 125,
"productTitle": "Chair",
"vendorId": 84,
"price": 230.0
}
]
JSON;
    
    $reader = new ArticlesJsonReader(new ArticleCollection());
    $offers = $reader->read($json);
    
    $filterIterator = new ArticleFilterIterator($offers->getIterator(), $commandsAvailable[$command], $arguments);
    $offersNumber = 0;
    foreach ($filterIterator as $offer) {
        $offersNumber++;
    }
    echo($offersNumber . "\n");
} catch (Throwable $e) {
    echo ($e->getMessage());
    $log->error( $e->getMessage(), $e->getTrace());
}

