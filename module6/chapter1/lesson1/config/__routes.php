<?php
/**
 * routes.php
 * hennadii.shvedko
 * 17.10.2023
 */

use App\Controller\ProductController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('api_post_show', '/products')
        ->controller([ProductController::class, 'index'])
        ->methods(['GET', 'HEAD']);
    $routes->add('api_post_edit', '/product/{id}')
        ->controller([ProductController::class, 'product'])
        ->methods(['PUT']);
};
