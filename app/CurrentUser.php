<?php

namespace app;

use models\Repository;

class CurrentUser
{
    private static $user = null;

    public static function login($id)
    {
        $_SESSION['user_id'] = $id;
    }

    public static function logout()
    {
        unset($_SESSION['user_id']);
    }

    public static function check()
    {
        if (isset($_SESSION['user_id'])) {
            self::$user = Repository::findUserById($_SESSION['user_id']);
        }
    }

    public static function isAuth()
    {
        return isset(self::$user);
    }

    public static function getUser()
    {
        return self::$user;
    }
}
