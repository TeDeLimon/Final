<?php

namespace Model;

class CRPC extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'comandas';
    protected static $columnasDB = ['id','fecha','hora','comensales','mesa','nombreplato','precioplato', 'cantidad'];

    public $id;
    public $fecha;
    public $hora;
    public $comensales;
    public $mesa;
    public $nombreplato;
    public $precioplato;
    public $cantidad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->comensales = $args['comensales'] ?? '';
        $this->mesa = $args['mesa'] ?? '';
        $this->nombreplato = $args['nombreplato'] ?? '';
        $this->precioplato = $args['precioplato'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
    }
}