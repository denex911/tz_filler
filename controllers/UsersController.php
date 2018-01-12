<?php

class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $id
     * @throws Exception
     */
    public function userId($id = null)
    {
        $user = User::getUserId($id);

        if (empty($user)) {
            throw new Exception('User not found', 404);
        }

        Response::json($user);
    }

    public function users()
    {
        $users = User::getUsers();
        Response::json($users);
    }

}