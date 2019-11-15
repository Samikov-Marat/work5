<?php

namespace app;

/**
 * Класс для отображения шаблона и передачи в него переменных
 * Class Render
 * @package app
 */
class Render
{
    private static $data = [];

    /**
     * Добавляет переменную в шаблон
     * @param string $name
     * @param $value
     */
    public static function with(string $name, $value)
    {
        self::$data[$name] = $value;
    }

    /**
     * Выводит шаблон, передавая в него переменные
     * @param string $template
     */
    public static function show(string $template)
    {
        if (!empty(self::$data)) {
            extract(self::$data);
        }
        require './views/' . $template;
    }

    /**
     * Возвращает в браузер редирект.
     * @param string $url
     */
    public static function redirectTo(string $url)
    {
        header('Location: ' . $url); /* Перенаправление браузера */
    }

}