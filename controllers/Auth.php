<?php

namespace controllers;

use app\CurrentUser;
use app\Render;
use models\Repository;

class Auth implements ControllerInterface
{
    public function execute(array $semanticParameters)
    {
        $user = Repository::findUser($_POST['login']);

        if($user['password'] == $_POST['password']){
            CurrentUser::login($user['id']);
        }

        Render::redirectTo('/');
    }

}