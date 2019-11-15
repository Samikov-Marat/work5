<?php

namespace app;

/**
 * Разбирает входящий запрос. Выделяет путь из uri и метод.
 * Class Request
 * @package app
 */
class Request
{
    private $path;
    private $method;

    public function __construct(array $server)
    {
        $this->path = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->method = mb_strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Возвращает путь
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Возвращает метод запроса
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

}