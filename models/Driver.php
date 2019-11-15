<?php

namespace models;

/**
 * Подключается к базе данных и выполняет запросы. (Singleton)
 * Class Driver
 * @package models
 */
class Driver
{
    private $pdo;

    private static $instance = null;

    /**
     * Приватный конструктор
     * Driver constructor.
     */
    private function __construct()
    {
        self::$instance = $this;
    }

    /**
     * Возвращает экземпляр-singleton
     * @return Driver|null
     */
    public static function getInstance()
    {
        return self::$instance ?? new static;
    }

    /**
     * Подключается к базе данных
     * @param array $config
     */
    public function connect(array $config)
    {
        $this->pdo = new \PDO($config['dsn'], $config['user'], $config['password']);
    }

    /**
     * Выполняет запрос
     * @param string $query
     * @param array $params
     */
    public function execute(string $query, array $params)
    {
        $prepared = $this->pdo->prepare($query);
        $prepared->execute($params);
    }

    /**
     * Выполняет запрос и возвращает массив
     * @param string $query
     * @param array $params
     * @return mixed
     */
    public function executeAndReturn(string $query, array $params)
    {
        $prepared = $this->pdo->prepare($query);
        $prepared->execute($params);

        return $prepared->fetchAll();
    }
}