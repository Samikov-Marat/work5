<?php

namespace app;

use controllers\ControllerInterface;

/**
 * Маршрутизатор. Хранит список машрутов
 * Class Router
 * @package app
 */
class Router
{
    /**
     * Список маршртов
     * @var array
     */
    private static $routes = [];

    const GET = 'get';
    const POST = 'post';

    /**
     * Функция для регистрации контроллера
     * @param string $method
     * @param string $regexp
     * @param ControllerInterface $controller
     */
    public static function register(string $method, string $regexp, ControllerInterface $controller)
    {
        self::$routes[] = new Route($method, $regexp, $controller);
    }

    /**
     * перебирает все маршруты, пока не найдёт первый подходящий.
     * @param Request $request
     */
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