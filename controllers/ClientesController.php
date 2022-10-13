<?php
//Las funciones vienen de una clase que se va a llamar controlador
namespace Controllers;

use MVC\Router;
use Model\Mesas;
use Model\Clientes;
use Model\ReservasMesas;
use Intervention\Image\ImageManagerStatic as Image;

class ClientesController {

    public static function index(Router $router) {
        $mensaje = $_GET['mensaje'] ?? null;
        $router->render('clientes/main',[
        ]);
    }
    
    public static function login(Router $router) {
        $cliente = new Clientes();
        $errores = Clientes::getErrores();
        $mensaje = $_GET['mensaje'] ?? null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args = $_POST['login'];
            $cliente = new Clientes($args);
            $errores = $cliente->validar();
            if (empty($errores)) {
                if(!empty($_FILES['login']['tmp_name']['ruta'])) {
                     //Genera un nombre único
                    $nombreImagen =md5(uniqid(rand(), true)) . '.jpg';
                    //Establecemos la imagen 
                    //Realiza un resize a la imagen con IntervetionImage
                    $image = Image::make($_FILES['login']['tmp_name']['ruta'])->fit(800,600); //Aplica un efecto de resize y recorte
                    $cliente->setImagen($nombreImagen);
                    //Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }
                    //Guardar la imagen en el servidor
                    $image->save(CARPETA_IMAGENES.'/'.$nombreImagen);
                    //Guarda en la base de datos
                }
                $resultado = $cliente->guardar();
                if($resultado) {
                    header('Location: /?mensaje=1');
                }
            }
        }
        $router->render('clientes/login',[
            'cliente' => $cliente,
            'errores' => $errores,
            'mensaje' => $mensaje
        ]);
    }
    public static function user(Router $router) {
        $mensaje = $_GET['mensaje'] ?? null;
        $errores = Clientes::getErrores();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($cliente = Clientes::findPhone($_POST['user']['telefono'])) {
                if($_POST['user']['password'] == $cliente->password)  {
                    // start a session
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $cliente->id;
                    $_SESSION['nombre'] = $cliente->nombre;
                    $_SESSION['apellidos'] = $cliente->apellidos;
                    header("Location: /reservas");
                }
                else $errores[] = "Contraseña incorrecta";
            }
            else $errores[] = "Usuario desconocido";
        }
        $router->render('clientes/user',[
            'errores' => $errores,
            'mensaje' => $mensaje
        ]);
    }

    public static function reservas(Router $router) {
        if(!isset($_SESSION['logged'])) {
            header('Location: /user');
        }
        $router->render('reservas/index',[
        ]);
    }

    public static function bookings(Router $router) {
        if(!isset($_SESSION['logged'])) {
            header('Location: /user');
        }
        $id = $_SESSION['id'];
        $query = "SELECT * FROM reservas WHERE clientes_id =  '$id' AND estado = 'reservada' ORDER BY fecha ASC";
        $reservas = ReservasMesas::SQL($query);
        $router->render('reservas/booking',[
            'reservas' => $reservas
        ]);
    }
        
    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = validarORedireccionarPOST('/admin','id_persona');
            if(validarTipoContenido($_POST['tipo'])) {
                $cliente = Clientes::findJoin($id);
                $cliente->eliminar();
                header('Location: /?mensaje=3');
            }
        }
    }

}

