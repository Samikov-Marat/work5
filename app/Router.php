<?php

namespace app;

use controllers\ControllerInterface;

class Router
{
    private static $routes = [];

    const GET = 'get';
    const POST = 'post';

    public static function register(string $method, string $regexp, ControllerInterface $controller)
    {
        self::$routes[] = new Route($method, $regexp, $controller);
    }

    public static function walk(Request $request)
    {
        $method = $request->getMethod();
        $path = $request->getPath();
        foreach (self::$routes as $route) {
            if ($route->wasExecuted($method, $path)) {
                break;
            }
        }
    }
}