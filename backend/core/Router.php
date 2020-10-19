<?php


class Router
{
    private static $allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];
    private static $routes = [];

    /**
     * @param $method
     * @param $uri
     * @param $action
     * @throws Exception
     */
    public static function add($method, $uri, $action) {
        if (!in_array($method, self::$allowedMethods)) {
            throw new Exception('Invalid method supplied: '.$method);
        }

        // TODO: check if action controller and controller method exists
        self::$routes[$uri][$method] = $action;
    }

    /**
     * @param $uri
     * @param $action
     * @throws Exception
     */
    public static function get($uri, $action) {
        self::add('GET', $uri, $action);
    }

    /**
     * @param $uri
     * @param $action
     * @throws Exception
     */
    public static function post($uri, $action) {
        self::add('POST', $uri, $action);
    }

    /**
     * @param $uri
     * @param $action
     * @throws Exception
     */
    public static function put($uri, $action) {
        self::add('PUT', $uri, $action);
    }

    /**
     * @param $uri
     * @param $action
     * @throws Exception
     */
    public static function delete($uri, $action) {
        self::add('DELETE', $uri, $action);
    }

    /**
     * @return mixed
     */
    public static function run() {
        // TODO: unify url path format
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Check if uri exists
        foreach (self::$routes as $path=>$route) {
            if (preg_match("(".$path.")", $requestUri)) {
                $uriRoutes = self::$routes[$path];

                // Check if method exists
                if (!array_key_exists($_SERVER['REQUEST_METHOD'], $uriRoutes)) {
                    http_response_code(405);
                    exit();
                }
                $action = $uriRoutes[$_SERVER['REQUEST_METHOD']];
        
                // Exec action and echo result
                list($controllerName, $controllerMethod) = explode('@', $action);
                echo self::createController($controllerName)->$controllerMethod();
            }
        }        
        http_response_code(404);
        exit();
    }

    /**
     * @param $controllerName
     * @return mixed
     */
    private static function createController($controllerName) {
        $fullControllerName = 'App\\Controllers\\'.$controllerName;
        return new $fullControllerName;
    }
}