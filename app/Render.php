<?php

namespace app;

class Render
{
    private static $data = [];

    public static function with(string $name, $value)
    {
        self::$data[$name] = $value;
    }

    public static function show(string $template)
    {
        if (!empty(self::$data)) {
            extract(self::$data);
        }
        require './views/' . $template;
    }

    public static function redirectTo(string $url)
    {
        header('Location: ' . $url); /* Перенаправление браузера */
    }

}