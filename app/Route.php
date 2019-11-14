<?php

namespace app;

use controllers\ControllerInterface;

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