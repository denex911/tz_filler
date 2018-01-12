<?php

class DefaultController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = [
            'message' => 'Test task for PDFfiller'
        ];
        Response::json($response, 200);
    }

}