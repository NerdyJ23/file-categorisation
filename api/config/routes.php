<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

use App\Middleware\AuthenticationMiddleware;

return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);
	$routes->registerMiddleware('auth', new AuthenticationMiddleware());
    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', 'Api::index');
    });
};
