<?php

namespace Model;

class Mesas extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'mesas';
    protected static $columnasDB = ['id','numero','capacidad'];

    public $id;
    public $numero;
    public $capacidad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->numero = $args['numero'] ?? '';
        $this->capacidad = $args['capacidad'] ?? '';
        $this->estado = $args['estado'] ?? 'disponible';
    }

    public function validar() {
        if(!$this->numero) self::$alertas['error'][] = 'El número de la mesa es Obligatoria';
        if(!$this->capacidad) self::$alertas['error'][] = 'La capacidad de la mesa es obligatoria';
        if(!is_numeric($this->capacidad)) self::$alertas['error'][] = 'La capacidad debe contener solo números';
        return self::$alertas;
    }
}