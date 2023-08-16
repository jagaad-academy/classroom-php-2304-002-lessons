<?php
/**
 * Simple router class
 */

namespace OnlineStoreProject\App;

use OnlineStoreProject\Controllers\MainController;

/**
 * Simple router class definition
 */
class Router
{
    const ROUTE_LABEL = 'route';
    const METHOD_LABEL = 'method';
    const CLASS_NAME = 'className';
    const ACTION_NAME = 'actionName';
    public static array $routes = [];
    /**
     * @var int
     */
    public static int $idURLParameter = 0;

    /**
     * @param string $route
     * @param string $method
     * @param string $className
     * @param string $actionName
     * @return void
     */
    public static function add(string $route, string $method, string $className, string $actionName): void
    {
        $route = str_replace('{id}', '(.*)', $route); // /cart/remove/{id} -> /cart/remove/(.*)
        $indexName = md5($method . $route); // get/cart/remove/(.*) -> md5("get/cart/remove/(.*)") -> Router index
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
        $method = strtolower($_SERVER['REQUEST_METHOD']); // get/post/put/patch.....
        $route = strtolower($_SERVER['REQUEST_URI']); // /cart/remove/513 <-> /cart/remove/(.*)

        $indexName = md5($method . $route);
        if (array_key_exists($indexName, self::$routes)) {
            self::callControllerWithAction($indexName);
        } else {
            foreach (self::$routes as $index => $routeToCheck) {
                $routeRexExp = "/" . str_replace("/", "\/", $routeToCheck[self::ROUTE_LABEL]) . "/m";
                preg_match_all($routeRexExp, $route, $matches);
                if (!empty($matches)) {
                    $id = $matches[1][0] ?? 0;
                    $id = (int)$id;
                    if ($id != 0) {
                        $routeReplaced = str_replace($id, '(.*)', $route); // $id = 513 -> (.*)
                        // $routeReplaced -> /cart/remove/(.*)
                        $indexToCheck = md5($method . $routeReplaced);
                        if($indexToCheck == $index) {
                            self::$idURLParameter = $id;
                            self::callControllerWithAction($index);
                            return;
                        }
                    }
                }
            }
        }

        $mainController = new MainController(new View());
        $mainController->pageNotFoundAction();
        die;
    }

    /**
     * @param  string $indexName
     * @return void
     */
    private static function callControllerWithAction(string $indexName): void
    {
        $classNameSpace = self::$routes[$indexName][self::CLASS_NAME];
        $action = self::$routes[$indexName][self::ACTION_NAME];
        if (class_exists($classNameSpace)) {
            $viewObject = self::getViewObject();
            $object = new $classNameSpace($viewObject); // new OnlineStore\Controllers\MainController($viewObject)
            $object->{$action . "Action"}(); // $object->indexAction() -> VALID
            //$object->$action . "Action"(); // $object->index . Action() -> INVALID
        }
    }

    /**
     * @return View
     */
    private static function getViewObject(): View
    {
        $view = NATIVE;
        foreach (LIST_OF_TEMPLATE_ENGINES as $nameOfTemplateEngine => $templateEngineIsActive) {
            if ($templateEngineIsActive) {
                $view = $nameOfTemplateEngine;
            }
        }

        $viewObject = match ($view) {
            TWIG => new ViewTwig(),
            default => new View(),
        };
        return $viewObject;
    }
}
