<?php
    namespace app\routes;

    use Exception;
    use app\helpers\Request;
    use app\helpers\Uri;

    class Router{
        const CONTROLLER_NAMESPACE='app\\controllers';

        public static function load($controller, $method){
            try {
                //verificar se o controller existe
                $controllerNamespace = self::CONTROLLER_NAMESPACE.'\\'.$controller;
                if(!class_exists($controllerNamespace)){
                    throw new Exception("O Controller {$controller} não existe.");
                }
                //se existe cria uma instancia desse controller
                $controllerInstance = new $controllerNamespace;

                 //verificar se o método existe
                 if(!method_exists($controllerNamespace,$method)){
                     throw new Exception("O method {$method} não existe no controller {$controller}.");
                 }
                 //se existe chama o controller instance chamando o metodo do controller
                 $controllerInstance->$method((object)$_REQUEST);

            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

        public static function routes():array
        {
            return [
                'get' => [
                    '/' => fn()=> self::load('HomeController','index'),
                    '/contact' => fn()=> self::load('ContactController','index'),
                    '/product' => fn()=> self::load('ProductController','index'),
                ],
                'post' => [
                    '/contact' => fn()=> self::load('ContactController','store')
                ],
                'put' => [
                    '/product' => fn()=> self::load('ProductController','update')
                ],
                'delete' =>[

                ]
            ];
        }
        public static function execute()
        {
            try {
                //aqui é pra pegar as rotas usando o metodo routes
                $routes = self::routes();
                $request = Request::get();
                $uri = Uri::get('path');

                if(!isset($routes[$request])){
                    throw new Exception("A rota não existe");                    
                }

                //verifica se no routes existe a tal da uri
                if(!array_key_exists($uri,$routes[$request])){
                    throw new Exception("A rota não existe");
                }

                //se tudo existir cria uma router passando:
                $router = $routes[$request][$uri];
 
                if(!is_callable($router)){
                    throw new Exception("A rota {$uri} nao é chamavel");//quando da essa é porque falta eu colocar a arrow function fn()=> nessa rota
                }

                $router();

            } catch (\Throwable $th) {
               echo $th->getMessage();
            }
        }

    }

?>