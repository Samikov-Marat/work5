<?php

namespace app;

use controllers\ControllerInterface;

/**
 * Маршрут. Хранит данные для сопоставления запроса и контроллера, а также запускает контроллер
 * Class Route
 * @package app
 */
class Route
{
    private $method;
    private $regexp;
    private $controller;

    public function __construct(string $method, string $regexp, ControllerInterface $controller)
    {
        $this->method = $method;
        $this->regexp = $regexp;
        $this->controller = $controller;
    }

    /**
     * Запускает контроллер, если запрос соответствует условиям этого маршрута
     * @param string $method
     * @param string $path
     * @return bool Возвращает true, если условие было выполнено и контроллер запущен
     */
    public function wasExecuted(string $method, string $path)
    {
        $wasExecuted = false;
        $matches = [];

        if (($this->method == $method) && (preg_match($this->regexp, $path, $matches))) {
            $this->controller->execute($matches);
            $wasExecuted = true;
        }
        return $wasExecuted;
    }


}