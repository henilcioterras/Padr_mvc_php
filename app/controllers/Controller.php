<?php
    namespace app\controllers;
    use League\Plates\Engine;

    abstract class Controller
    {
        public function view (string $view,array $data=[]){
             $pathViews = dirname(__FILE__,2).DIRECTORY_SEPARATOR.'views';//diretorio onde estao todas as views

             $templates = new Engine($pathViews);

             echo $templates->render($view,$data);
        }
        
    }
    


?>