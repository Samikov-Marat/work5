<?php

namespace controllers;

use app\CurrentUser;
use app\Render;
use models\Repository;

class Logout implements ControllerInterface
{
    public function execute(array $semanticParameters)
    {
        if (CurrentUser::isAuth()) {
            CurrentUser::logout();
        }

        Render::redirectTo('/');
    }

}