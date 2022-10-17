<?php

namespace Controllers;

use Model\Mesas;
use Model\Platos;
use Model\Clientes;
use Model\Comandas;
use Model\ReservasMesas;

class APIController {
    public static function index() {
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];
        $usuario = $_POST['usuario'] ?? '';
        $query = "SELECT * FROM reservas INNER JOIN mesas ON reservas.mesas_id = mesas.id where reservas.estado = 'reservada' AND reservas.fecha = '$fecha' and reservas.hora = '$hora';";
        $mesas = Mesas::all();
        $mesasReservadas = ReservasMesas::SQL($query);
        foreach($mesasReservadas as $posicion => $mesaReservada) {
            if($mesaReservada->estado == 'reservada') {
                foreach($mesas as $mesa) {
                    if($mesaReservada->mesas_id == $mesa->id) {
                        $mesa->estado = 'reservada';
                    }
                }
            }
        }
        echo json_encode([
            'mesas' => $mesas
        ]);
    }

    public static function comprobarCita() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fecha = $_POST['fecha'];
            $usuarioId = $_POST['clientes_id'];
            $query = "SELECT * FROM reservas INNER JOIN clientes ON clientes.id = reservas.clientes_id WHERE fecha = '$fecha' AND clientes.id = '$usuarioId';";
            $resultado = Clientes::SQL($query);
            if(count($resultado) > 0) echo json_encode(['resultado' => $resultado = false]);
            else echo json_encode(['resultado' => $resultado = true]);
        }
    }

    public static function guardar() {
        //Almacena la cita y devuelve el ID
        $reserva = new ReservasMesas($_POST);
        $query = "INSERT INTO reservas (clientes_id, mesas_id, comensales, fecha, hora, comentarios) VALUES ('$reserva->clientes_id','$reserva->mesas_id','$reserva->comensales','$reserva->fecha','$reserva->hora','$reserva->comentarios');";
        $resultado = $reserva->guardarSQL($query);
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientes_id = $_POST['clientes_id'];
            $mesas_id = $_POST['mesas_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado = $_POST['estado'];
            $comensales = $_POST['comensales'];
            $query = "DELETE FROM reservas WHERE clientes_id = '$clientes_id' AND mesas_id = '$mesas_id' AND comensales = '$comensales' AND fecha = '$fecha' AND hora = '$hora' AND estado = '$estado';";
            $resultado = ReservasMesas::eliminarSQL($query);
            if($resultado)  header('Location: '.$_SERVER['HTTP_REFERER']); //Nos redirige a la página dónde veníamos
        }
    }

    public static function platos() {
        $platos = Platos::all();
        echo json_encode(['platos' => $platos]);
    }

    public static function comanda() {
        $carrito = json_decode($_POST['carrito']);
        $idReserva = $_POST['reserva'];
        $query = "SELECT mesas_id FROM reservas WHERE id = '$idReserva';";
        $mesa = ReservasMesas::firstSQL($query);
        foreach($carrito as $carrito) {
            $query = "INSERT INTO comandas (platos_id, mesas_id, reservas_id, cantidad) VALUES ('$carrito->id', '$mesa->mesas_id','$idReserva','$carrito->cantidad');";
            $resultado = ReservasMesas::guardarSQL($query);
        }
        echo json_encode(['resultado' => true]);        
    }

    public static function existeComanda() {
        $idReserva = $_POST['reserva'];
        $query = "SELECT * FROM comandas WHERE reservas_id = '$idReserva';";
        $resultado = Comandas::SQL($query);
        if(count($resultado) > 0) echo json_encode(['resultado' => true]);
        else echo json_encode(['resultado' => false]);
    }
}