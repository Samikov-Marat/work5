<?php

namespace controllers;

use app\CurrentUser;
use app\Render;

class IndexPage implements ControllerInterface
{
    public function execute(array $semanticParameters)
    {
        if (CurrentUser::isAuth()) {
            $user = CurrentUser::getUser();
        } else {
            $user = null;
        }
        Render::with('user', $user);
        Render::show('index.php');
    }
}