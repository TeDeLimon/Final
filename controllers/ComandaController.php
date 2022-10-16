<?php

namespace Controllers;

use MVC\Router;
use Model\Platos;

class ComandaController {
    public static function index(Router $router) {
        if(!isset($_SESSION['logged'])) {
            header('Location: /user');
        }
        $idReserva = $_POST["id_reserva"];
        $platos = Platos::all();
        $router->render('comandas/index', [
            'platos' => $platos,
            'idReserva' => $idReserva
        ]);
    }
}
