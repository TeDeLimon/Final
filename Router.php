<?php
namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) { //Recibe la url y la función
        $this->rutasGET[$url] = $fn; //Asociamos a cada ruta de tipo get una función
    }
    public function post($url, $fn) { //Recibe la url y la función
        $this->rutasPOST[$url] = $fn; //Asociamos a cada ruta de tipo get una función
    }
    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['logged'] ?? null;
        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/reservas'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        //Proteger las rutas, busca la ruta actual en las rutas protegidas
        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /user');
        }

        if ($metodo == 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        } 
        if($fn) {
            call_user_func($fn,$this);
        } else {
            header('Location: error.php');
            //También podemos redirigir a una página 404
        }  
    }
    public function render($view, $datos = []) {
        foreach($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); //iniciar un almacenamiento en memoria
        include __DIR__ . '/views/'.$view.'.php';
        $contenido = ob_get_clean(); //Limpiamos la memoria para no consumir memoria del servidor
        include __DIR__ . '/views/layout.php';
    }
}