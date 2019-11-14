<?php

namespace app;

class Request
{
    private $path;
    private $method;

    public function __construct(array $server)
    {
        $this->path = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->method = mb_strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getMethod()
    {
        return $this->method;
    }

}