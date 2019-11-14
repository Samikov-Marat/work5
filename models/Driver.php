<?php

namespace models;


class Driver
{
    private $pdo;

    private static $instance = null;

    private function __construct()
    {
        self::$instance = $this;
    }

    public static function getInstance()
    {
        return self::$instance ?? new static;
    }

    public function connect($config)
    {
        $this->pdo = new \PDO($config['dsn'], $config['user'], $config['password']);
    }

    public function execute($query, $params)
    {
        $prepared = $this->pdo->prepare($query);
        $prepared->execute($params);
    }

    public function executeAndReturn($query, $params)
    {
        $prepared = $this->pdo->prepare($query);
        $prepared->execute($params);

        return $prepared->fetchAll();
    }
}