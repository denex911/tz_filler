<?php


class Router
{

    public $routes = [];

    public function __construct($routes = [])
    {
        $this->routes = $routes;
        return $this;
    }


    /**
     * @return mixed
     * @throws Exception
     */
    public function run()
    {
        $requestUri = $_SERVER['REQUEST_URI'] !== '/' ? rtrim($_SERVER['REQUEST_URI'], '/') : '/';

        foreach ($this->routes as $val) {

            $route = key($val['route']);
            $uri = array_shift($val['route']);
            $method = $val['method'];

            if ($method !== $_SERVER['REQUEST_METHOD']) {
                throw new Exception('Wrong method');
            }

            if ($route == $requestUri) {
                list($controller, $action) = $this->_splitUri($uri);
                return $this->_execute($controller, $action);
            }

            // Заменяем wildcards на рег. выражения
            if (strpos($route, ':') !== false) {
                $route = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', $route));
            }


            if (preg_match('#^' . $route . '$#', $requestUri)) {
                if (strpos($uri, '$') !== false AND strpos($route, '(') !== false) {
                    $uri = preg_replace('#^' . $route . '$#', $uri, $requestUri);
                }
                list($controller, $action, $params) = $this->_splitUri($uri);
                return $this->_execute($controller, $action, (array)$params);
            }
        }
        throw new Exception('This entity is absent', 404);
    }

    /**
     * @param string $controller
     * @param string $action
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    private function _execute($controller = 'DefaultController', $action = 'index', $params = [])
    {
        if (method_exists($controller, $action)) {
            $controller = new $controller();
            return call_user_func_array([$controller, $action], $params);
        }
        throw new Exception('This entity is absent', 404);
    }

    /**
     * @param string $uri
     * @return array[]|false|string[]
     */
    private function _splitUri($uri = '')
    {
        return preg_split('/\//', $uri, -1, PREG_SPLIT_NO_EMPTY);
    }

}