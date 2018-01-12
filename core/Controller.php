<?php

class Controller
{

    public $auth;

    /**
     * Controller constructor.
     */
    public function __construct()
    {

        $this->auth = new Auth();

    }
}