<?php

namespace todolist;

class RestAPI extends Controllers
{
    function __construct($url)
    {
        $this->initHeaders();
        if (!isset($_SESSION['user_id'])) {
            $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
            $response['body'] = json_encode([
                'error' => 'Authentication Failed'
            ]);
            header($response['status_code_header']);
            if ($response['body']) {
                echo $response['body'];
            }
            return;
        }
        if ($url[1] === "user") {
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $result = $this->model('User')->getOne($_SESSION['user_id']);
            header($response['status_code_header']);
            $response['body'] = json_encode($result);
            echo $response['body'];
        }
    }

    function initHeaders()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }
}
