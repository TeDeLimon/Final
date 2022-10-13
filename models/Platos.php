<?php

namespace Model;

class Platos extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'platos';
    protected static $columnasDB = ['id','nombre','descripcion','tipo','precio','ruta'];

    public $id;
    public $nombre;
    public $descripcion;
    public $tipo;
    public $precio;
    public $ruta;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->precio = $args['precio'] ?? null;
        $this->ruta = $args['ruta'] ?? '';
    }
}