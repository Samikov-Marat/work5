<?php
session_start();
require_once 'autoloader.php';

// Список маршрутов
require_once 'routes.php';

// Настройки (для базы данных)
$config = require_once 'config.php';

use app\Request;
use app\Router;
use models\Driver;
use app\CurrentUser;

// Подключение к базе данных
Driver::getInstance()->connect($config['default']);

// Проверка есть ли авторизованные пользователи
CurrentUser::check();

// Разбор метода и uri
$request = new Request($_SERVER);

// Запуск маршрутизатора
Router::walk($request);