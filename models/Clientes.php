<?php
namespace Model;

class Clientes extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'telefono','email','password','tipo','recover','imagen'];

    public $id;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $email;
    public $password;
    public $tipo;
    public $recover;
    public $imagen;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->recover = $args['recover'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        
    }

    public function validar() {
        if(!$this->nombre) self::$errores[] = 'El nombre es obligatorio';
        if(!$this->apellidos) self::$errores[] = 'Los apellidos son obligatorios';
        if(!$this->telefono) self::$errores[] = 'El telefono es obligatorio';
        if(!$this->email) self::$errores[] = 'El email es obligatorio';
        if(!$this->password) self::$errores[] = 'La contraseña es obligatoria';
        if(strlen($this->telefono) != 9) self::$errores[] = 'El telefono debe tener 9 dígitos';
        if(!preg_match('/^[0-9]{9}$/',$this->telefono)) self::$errores[] = "El teléfono debe tener un formato válido";

        return self::$errores;
    }

    
}