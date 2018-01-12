<?php

class User
{

    public static $users = [
        1 => [
            'name' => 'user',
            'email' => 'user@text.com',
            'pass' => '123456',
            'phone' => '+380992223344',
            'age' => 20,
            'sex' => 'M',
        ],
        2 => [
            'name' => 'admin',
            'email' => 'admin@text.com',
            'pass' => '123456',
            'phone' => '+380992223355',
            'age' => 25,
            'sex' => 'F',
        ],
    ];


    /**
     * @return array
     */
    public static function getUsers()
    {
        return self::$users;
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getUserId($id)
    {
        if(isset(self::$users[$id])){
            return self::$users[$id];
        }
        return [];
    }

}