<?php

namespace Controllers;

use MVC\Router;
use Model\Platos;

class ComandaController {
    public static function index(Router $router) {
        $idReserva = $_POST["id_reserva"];
        $platos = Platos::all();
        $router->render('comandas/index', [
            'platos' => $platos,
            'idReserva' => $idReserva
        ]);
    }
}
