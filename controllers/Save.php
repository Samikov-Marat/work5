<?php


namespace controllers;

use app\Render;
use models\Repository;

class Save implements ControllerInterface
{
    public function execute(array $semanticParameters)
    {
        Repository::updateUser($_POST);

        Render::redirectTo('/');
    }
}