<?php

class Error
{
    /**
     * @param int $errno
     * @param string $msg
     */
    public static function jsonErrorHandler($errno = 500, $msg = '')
    {
        $response['message'] = $msg;
        $response['code'] = $errno;
        http_response_code($errno);

        exit(json_encode($response));

    }

    /**
     * @param Exception $e
     */
    public static function jsonExceptionHandler(Exception $e)
    {
        $code = $e->getCode();
        $response['message'] = $e->getMessage();
        $response['code'] = $code;
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        exit(json_encode($response));

    }

}