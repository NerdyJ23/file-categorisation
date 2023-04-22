<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

use App\Middleware\AuthenticationMiddleware;

return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);
	$routes->registerMiddleware('auth', new AuthenticationMiddleware());
    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', 'Api::index');
	
		$builder->scope('/login', function (RouteBuilder $builder) {
			$builder->connect('/', 'Users::login');
		});

		$builder->scope('/files', function (RouteBuilder $builder) {
			$builder->connect('/', 'Files::list');
		});

		$builder->scope('/users', function (RouteBuilder $builder) {
			$builder->put('/', 'Users::create');
		});
    });
};
