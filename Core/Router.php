<?php

namespace Core;

class Router{

    // se por acaso a rota digitada for errada, ela vai redirecionar automaticamente para o controller cliente, para o método home dentro desse controller
    private $controller = 'Cliente';
    private $method = 'Home';
    private $param = [];

    public function __construct()
    {
        $router = $this->url();
        if(file_exists('App/Controllers/'. ucfirst($router[0]) .'.php')){
            $this->controller = $router[0];
            unset($router[0]);
        }

        $class = "\\App\\Controllers\\" . ucfirst($this->controller);
        $object = new $class;

        if(isset($router[1]) and method_exists($class, $router[1])){
            $this->method = $router[1];
            unset($router[1]);
        }

        $this->param = $router ? array_values($router) : [];

        call_user_func_array([$object, $this->method], $this->param);
    }

    public function url()
    {
        $url = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
        return $url;
    }

}