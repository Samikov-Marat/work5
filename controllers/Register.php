<?php


namespace controllers;

use app\Render;
use models\Repository;

class Register implements ControllerInterface
{
    public function execute(array $semanticParameters)
    {
        Repository::findUser($_POST['login']);

        Render::redirectTo('/');
    }
}