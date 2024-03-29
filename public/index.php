<?php 
require_once '../includes/app.php';

use MVC\Router;
use Model\Clientes;
use Controllers\APIController;
use Controllers\CartaController;
use Controllers\ComandaController;
use Controllers\ClientesController;

$router = new Router();

//UI de Clientes
$router->get('/',[ClientesController::class,'index']);
$router->get('/login',[ClientesController::class,'login']);
$router->post('/login',[ClientesController::class,'login']);
$router->get('/user',[ClientesController::class,'user']);
$router->post('/user',[ClientesController::class,'user']);
$router->get('/reservas',[ClientesController::class,'reservas']);
$router->post('/reservas',[ClientesController::class,'reservas']);
$router->get('/bookings',[ClientesController::class,'bookings']);
$router->post('/bookings',[ClientesController::class,'bookings']);
$router->get('/contacto',[ClientesController::class,'contacto']);

//UI de Carta
$router->get('/carta',[CartaController::class,'index']);

//UI de Comandas
$router->get('/comanda',[ComandaController::class,'index']);
$router->post('/comanda',[ComandaController::class,'index']);
$router->post('/comandas',[ComandaController::class,'comandas']);

//ENDPOINTs de la API
$router->get('/api/mesas',[APIController::class,'index']);
$router->post('/api/mesas',[APIController::class,'index']);
$router->post('/api/guardar',[APIController::class,'guardar']);
$router->post('/api/eliminar',[APIController::class,'eliminar']);
$router->post('/api/platos',[APIController::class,'platos']);
$router->post('/api/comprobar',[APIController::class,'comprobarCita']);
$router->post('/api/comanda',[APIController::class,'comanda']);
$router->post('/api/existeComanda',[APIController::class,'existeComanda']);



$router->comprobarRutas();
?>

    