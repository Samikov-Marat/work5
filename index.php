<?php
session_start();
require_once 'autoloader.php';
require_once 'routes.php';

$config = require_once 'config.php';

use app\Request;
use app\Router;
use models\Driver;
use app\CurrentUser;

Driver::getInstance()->connect($config['default']);

CurrentUser::check();

$request = new Request($_SERVER);

Router::walk($request);