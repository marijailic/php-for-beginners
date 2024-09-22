<?php

    namespace Core;
    use Core\Middleware\Middleware;

    class Router
    {
        protected $routes = [];

        public function add($method, $uri, $controller)
        {
             $this->routes[] = [
                 'uri' => $uri,
                 'controller' => $controller,
                 'method' => $method,
                 'middleware' => null
             ];

            // compact fn kreira polje u kojemu su kljucevi prosljedeni parametri,
            // a vrijednosti uzima iz varijabli koje imaju isti naziv kao i kljucevi (parametri)
            // $this->routes[] = compact('method', 'uri', 'controller');

            return $this;
        }

        public function get($uri, $controller)
        {
            return $this->add('GET', $uri, $controller);
        }
        public function post($uri, $controller)
        {
            return $this->add('POST', $uri, $controller);
        }
        public function delete($uri, $controller)
        {
            return $this->add('DELETE', $uri, $controller);
        }
        public function patch($uri, $controller)
        {
            return $this->add('PATCH', $uri, $controller);
        }
        public function put($uri, $controller)
        {
            return $this->add('PUT', $uri, $controller);
        }

        public function only($key)
        {
            $this->routes[array_key_last($this->routes)]['middleware'] = $key;
            return $this;
        }

        public function route($uri, $method)
        {
            foreach ($this->routes as $route) {
                if ($route['uri'] === $uri && $route['method'] == strtoupper($method)) {

                    Middleware::resolve($route['middleware']);

                    return require base_path('Http/controllers/' . $route['controller']);
                }
            }

            $this->abort();
        }

        public function previousUrl()
        {
            return $_SERVER['HTTP_REFERER'];
        }

        protected function abort($code = 404)
        {
            http_response_code($code);
            require base_path("/views/{$code}.php");
            die();
        }
    }

    // JEDNOSTAVNI ROUTER
    // ---------------------------------------------------
    //    $routes = require base_path('routes.php');
    //
    //    function routeToController($uri, $routes){
    //        if(array_key_exists($uri, $routes)) {
    //            require base_path($routes[$uri]);
    //        } else {
    //            abort();
    //        }
    //    }
    //
    //    // defaultna vrijednost parametra
    //    function abort($code = 404){
    //        // dajem response sa status codeom
    //        http_response_code($code);
    //        require base_path("views/{$code}.php");
    //        die();
    //    }
    //
    //    // uzimam path iz REQUEST_URI pomocu parse_url
    //    $uri = parse_url($_SERVER["REQUEST_URI"])['path'];
    //
    //    routeToController($uri, $routes);