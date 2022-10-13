<?php

namespace Controllers;

use MVC\Router;
use Model\Platos;

class CartaController {
    public static function index(Router $router) {
        $platos = Platos::all();
        $router->render('carta/index', [
            'platos' => $platos
        ]);
    }
}