<?php

namespace Controllers;

use Model\CRPC;
use MVC\Router;
use Model\Platos;

class ComandaController {
    public static function index(Router $router) {
        if(!isset($_SESSION['logged'])) {
            header('Location: /user');
        }
        if(!isset($_POST['id_reserva'])) {
            header('Location: /bookings');
        }
        $idReserva = $_POST["id_reserva"];
        $platos = Platos::all();
        $router->render('comandas/index', [
            'platos' => $platos,
            'idReserva' => $idReserva
        ]);
    }
    public static function comandas(Router $router) {
        if(!isset($_SESSION['logged'])) {
            header('Location: /user');
        }
        if(!isset($_POST['reserva'])) {
            header('Location: /bookings');
        }
        $idReserva = $_POST["reserva"];
        $query = "SELECT reservas.id as id, CONCAT(clientes.nombre, ' ', clientes.apellidos) as nombre, reservas.fecha as fecha, reservas.hora as hora, reservas.comensales as comensales, mesas.numero as mesa, platos.nombre as nombreplato, platos.precio as precioplato, comandas.cantidad as cantidad FROM COMANDAS INNER JOIN platos ON comandas.platos_id = platos.id INNER JOIN mesas ON mesas.id = comandas.mesas_id INNER JOIN reservas ON reservas.id = comandas.reservas_id INNER JOIN clientes ON reservas.clientes_id = clientes.id WHERE comandas.reservas_id = '$idReserva';";

        $platos = CRPC::SQL($query);
        $sumatorio = 0;
        foreach($platos as $plato) {
            $sumatorio = $sumatorio + $plato->cantidad * $plato->precioplato;
        }

        $router->render('comandas/comandas', [
            'idReserva' => $idReserva,
            'platos' => $platos,
            'sumatorio' => $sumatorio
        ]);
    }
}
