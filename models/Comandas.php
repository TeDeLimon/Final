<?php

namespace Model;

class Comandas extends ActiveRecord {
    protected static $tabla = 'comandas';
    protected static $columnasDB = ['id', 'platos_id', 'mesas_id', 'reservas_id','cantidad'];

    public $id;
    public $platos_id;
    public $mesas_id;
    public $reservas_id;
    public $cantidad;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->platos_id = $args['platos_id'] ?? '';
        $this->mesas_id = $args['mesas_id'] ?? '';
        $this->reservas_id = $args['reservas_id'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
    }

}