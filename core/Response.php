<?php

class Response
{
    /**
     * @param array $data
     * @param int $code
     * @param string $message
     */
    public static function json($data = [], $code = 200, $message = '')
    {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        echo json_encode($response);
        exit;
    }

    public static function unauthorized()
    {
        header('HTTP/1.0 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Access denied"');
        header('Content-Type: application/json charset=utf-8');

        echo json_encode(['message' => 'Unauthorized', 'code' => 401]);
        exit;
    }

}