<?php

namespace todolist;


class Router
{
    private $controller = 'login';
    private $method = 'init';
    private $params = [];
    private $defaultURL = "/discover";
    function __construct()
    {
        $url = $this->URLParser();
        $this->restAPIGateway($url);
        $base = isset($_SERVER["HTTPS"]) ? "https://" : "http://" . $_SERVER['HTTP_HOST'];
        $controller = ucfirst($url[0]);
        $this->auth($base, $url);
        if (file_exists('../app/controllers/' . $controller . '.php')) {
            $this->controller = $this->getController($controller);
            unset($url[0]);
        } else {
            header("Location:" . $base . $this->defaultURL);
        }
        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                header("Location:" . $base . "/" . strtolower($controller));
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    function getController(string $controller)
    {
        require_once('../app/controllers/' . $controller . '.php');
        return new (__NAMESPACE__ . '\\' . $controller);
    }
    public function URLParser()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    public function auth($base, $url)
    {
        // check if there is a login form submitted
        if (!isset($_SESSION['user_id'])) {
            $this->getController('Login')->login();
        }
        // if the user want to access a controller but never logged
        if (!isset($_SESSION['user_id']) && $url[0] !== "login") {
            header("Location:" . $base . "/login");
            exit;
        }
        // if the user doesnt provide a controller or method but already logged
        if (isset($_SESSION['user_id']) && ($url[0] === "login" || !isset($url[0]))) {
            header("Location:" . $base . $this->defaultURL);
            exit;
        }
        if (!isset($_SESSION['user_id']) && $url[0] === "login" && !isset($url[1])) {
            $this->getController('Login')->init();
            exit;
        }
    }
    public function restAPIGateway($url)
    {
        if (!isset($url[0])) return;
        if ($url[0] !== "v1") return;
        new RestAPI($url);
        exit;
    }
}
