<?php

namespace app;

use models\Repository;

/**
 * Класс для авторизации пользователя и получения авторизованного пользователя из базы
 * Class CurrentUser
 * @package app
 */
class CurrentUser
{
    private static $user = null;

    /**
     * Автоирзует пользователя по id
     * @param $id
     */
    public static function login($id)
    {
        $_SESSION['user_id'] = $id;
    }

    /**
     * Деавтозизует авторизованного пользователя
     */
    public static function logout()
    {
        unset($_SESSION['user_id']);
    }

    /**
     * Проверяет, есть ли авторизованный пользователь и загружает его данные из базы
     */
    public static function check()
    {
        if (isset($_SESSION['user_id'])) {
            self::$user = Repository::findUserById($_SESSION['user_id']);
        }
    }

    /**
     * Возвращает true, если есть авторизованный пользователь, данные которого уже загружены из базы
     * @return bool
     */
    public static function isAuth()
    {
        return isset(self::$user);
    }

    /**
     * Возвращает данные авторизованного пользователя
     * @return null
     */
    public static function getUser()
    {
        return self::$user;
    }
}
