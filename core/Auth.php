<?php

class Auth
{

    public $statusAuth;

    const USER = 'admin';
    const PASS = '123456';

    /**
     * Auth constructor.
     * HTTP Basic auth
     */
    public function __construct()
    {
        if ((isset($_SERVER['PHP_AUTH_USER']) AND isset($_SERVER['PHP_AUTH_PW'])) AND
            ($_SERVER['PHP_AUTH_USER'] == self::USER AND $_SERVER['PHP_AUTH_PW'] == self::PASS)) {
            return $this->statusAuth = true;
        } else {
            Response::unauthorized();
        }
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return $this->statusAuth;
    }
}