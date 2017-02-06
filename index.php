<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Correios/Cep.php';

use Correios\Cep;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$cep = new Cep();

$app->get('/', function () {

    return new Response(json_encode('Correios\CEP'), 200);

});

$app->get('/{code}', function ($code) use ($app, $cep) {

    return new Response($cep->get($code), 200);

})->value('cep', null);

$app->after(function (Request $request, Response $response) {

    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Content-Type', 'text/json');

});

$app->run();
