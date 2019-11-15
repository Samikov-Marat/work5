<?php

namespace controllers;

/**
 * Типичный контроллер
 * Interface ControllerInterface
 * @package controllers
 */
interface ControllerInterface
{
    /**
     * Обработчик
     * @param array $semanticParameters
     * @return mixed
     */
    public function execute(array $semanticParameters);
}