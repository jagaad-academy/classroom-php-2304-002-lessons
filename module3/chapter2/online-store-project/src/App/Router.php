<?php

namespace OnlineStoreProject\App;

use OnlineStoreProject\Controllers\MainController;

class Router
{
    const ROUTE_LABEL = 'route';
    const METHOD_LABEL = 'method';
    const CLASS_NAME = 'className';
    const ACTION_NAME = 'actionName';
    public static array $routes = [];

    /**
     * @param string $route
     * @param string $className
     * @param string $actionName
     * @return void
     */
    public static function add(string $route, string $method, string $className, string $actionName): void
    {
        $indexName = md5($method . $route);
        if (!array_key_exists($indexName, self::$routes)) {
            self::$routes[$indexName] = [
                self::ROUTE_LABEL => $route,
                self::METHOD_LABEL => $method,
                self::CLASS_NAME => $className,
                self::ACTION_NAME => $actionName
            ];
        }
    }

    public static function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $route = $_SERVER['REQUEST_URI'];

        $indexName = md5($method . $route);
        if(array_key_exists($indexName, self::$routes)){
            $classNameSpace = self::$routes[$indexName][self::CLASS_NAME];
            $action = self::$routes[$indexName][self::CLASS_NAME];
            if(class_exists($classNameSpace)){
                $object = new $classNameSpace(new View());
                $object->{$action . "Action"}();
            }
        } else {
            $mainController = new MainController();
            $mainController->pageNotFoundAction();
            die;
        }
    }
}
