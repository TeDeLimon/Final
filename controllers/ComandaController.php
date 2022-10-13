<?php

namespace Controllers;

use MVC\Router;
use Model\Platos;

class ComandaController {
    public static function index(Router $router) {
        $platos = Platos::all();
        $router->render('comandas/index', [
            'platos' => $platos
        ]);
    }
}