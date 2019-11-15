<?php


namespace models;

/**
 * Формирует запросы к базе данных
 * Class Repository
 * @package models
 */
class Repository
{
    /**
     * Создание нового пользователя
     * @param array $userRaw
     */
    public static function createUser(array $userRaw)
    {
        $query = 'INSERT INTO `user` SET `email`=:email, `login`=:login, `password`=:password, `name`=:name';
        $params = [
            ':email' => $userRaw['email'],
            ':login' => $userRaw['login'],
            ':password' => $userRaw['password'],
            ':name' => $userRaw['name'],
        ];

        Driver::getInstance()->execute($query, $params);
    }

    /**
     * Изменение данных профиля
     * @param array $userRaw
     */
    public static function updateUser(array $userRaw)
    {
        $query = 'UPDATE `user` SET `password`=:password, `name`=:name WHERE id=:id';
        $params = [
            ':id' => $userRaw['id'],
            ':password' => $userRaw['password'],
            ':name' => $userRaw['name'],
        ];

        Driver::getInstance()->execute($query, $params);
    }

    /**
     * Поиск пользователя по логину
     * @param $login
     * @return |null
     */
    public static function findUser($login)
    {
        $query = 'SELECT * FROM `user` WHERE `login`=:login LIMIT 1 ';
        $params = [
            ':login' => $login,
        ];

        $users = Driver::getInstance()->executeAndReturn($query, $params);
        if (count($users)) {
            $user = $users[0];
        } else {
            $user = null;
        }
        return $user;
    }

    /**
     * Поиск пользователя по id
     * @param $id
     * @return |null
     */
    public static function findUserById($id)
    {
        $query = 'SELECT * FROM `user` WHERE `id`=:id LIMIT 1 ';
        $params = [
            ':id' => $id,
        ];

        $users = Driver::getInstance()->executeAndReturn($query, $params);
        if (count($users)) {
            $user = $users[0];
        } else {
            $user = null;
        }
        return $user;
    }

}