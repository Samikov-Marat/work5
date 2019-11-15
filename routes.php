<?php

use app\Router;

/*
 * Регистрируем маршруты в маршрутизаторе
 * Каждый маршрут состоит из метода, шаблона uri и обработчика
 */

Router::register(Router::GET, '#/#', (new controllers\IndexPage()));
Router::register(Router::POST, '#/register#', (new controllers\Register()));
Router::register(Router::POST, '#/auth#', (new controllers\Auth()));
Router::register(Router::POST, '#/save#', (new controllers\Save()));
Router::register(Router::POST, '#/logout#', (new controllers\Logout()));