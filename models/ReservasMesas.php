<?php

namespace Model;

class ReservasMesas extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id','clientes_id','mesas_id','comensales','estado','fecha','hora', 'comentarios'];

    public $id;
    public $clientes_id;
    public $mesas_id;
    public $comensales;
    public $estado;
    public $fecha;
    public $hora;
    public $comentarios;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->clientes_id = $args['clientes_id'] ?? null;
        $this->mesas_id = $args['mesas_id'] ?? null;
        $this->comensales = $args['comensales'] ?? '';
        $this->estado = $args['estado'] ?? 'reservada';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->comentarios = $args['comentarios'] ?? '';
    }

    public function validar() {
        if(!$this->numero) self::$alertas['error'][] = 'El número de la mesa es Obligatoria';
        if(!$this->capacidad) self::$alertas['error'][] = 'La capacidad de la mesa es obligatoria';
        if(!is_numeric($this->capacidad)) self::$alertas['error'][] = 'La capacidad debe contener solo números';
        return self::$alertas;
    }
}