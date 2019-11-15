<?php

namespace controllers;

use app\CurrentUser;
use app\Render;

/**
 * Главная страница. В зависимости от авторизованности пользователся,
 * возвращает формы регистрации и авторизации или редактирования профиля.
 * Class IndexPage
 * @package controllers
 */
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