<?php

namespace Model;

class ActiveRecord {
    protected static $db;
    protected static $tabla = '';
    protected static $tablaJoin = '';
    protected static $tablaJoin2 = '';
    protected static $idJoin = '';
    protected static $idJoin2 = '';
    protected static $columnasDB = [];

    // Errores
    protected static $errores = [];

    public static function setDB($database) {
        self::$db = $database;
    }

    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public function guardarJoin() {
        $resultado = '';
        $id = static::$idJoin;
        if(!empty($this->$id)) {
            $resultado = $this->actualizarJoin();
        } else {
            $resultado = $this->crearJoin();
        }
        return $resultado;
    }

    public function guardar() {
        $resultado = '';
        if(!empty($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    public function actualizar() {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function crearJoin() {
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('"; 
        $query .= join("','", array_values($atributos));
        $query .= "')";
        $resultado = self::$db->query($query);

        $id = self::$db->insert_id;
        $this->setID($id);

        $atributos = $this->sanitizarAtributosJoin();

        $query = " INSERT INTO " . static::$tablaJoin . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if($resultado) {
            header('Location: /?mensaje=1');
        }
    }

    public function actualizarJoin($excepcion,$excepcionJoin) {
        $id = static::$idJoin;

        $atributos = $this->sanitizarAtributos();
        foreach($atributos as $key => $value) {
            if($key == $excepcion) continue;
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE " . static::$idJoin . " = '" . self::$db->escape_string($this->$id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        // Sanitizar los datos del Join
        $atributos = $this->sanitizarAtributosJoin();
        $valores = [];
        foreach($atributos as $key => $value) {
            if($key == $excepcionJoin) continue;
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tablaJoin ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE " . static::$idJoin . " = '" . self::$db->escape_string($this->$id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        $id = self::$db->insert_id;
        $this->setID($id);
        
        if($resultado) {
            header('Location: /?mensaje=2');
        }
    }
    
    public function eliminar() {
        // Eliminar el registro
        $id = static::$idJoin;
        $query = "DELETE FROM "  . static::$tabla . " WHERE " .static::$idJoin. " = " . self::$db->escape_string($this->$id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        
        return $resultado;
    }

    public static function findJoin($id) {
        $query = "SELECT * FROM " . static::$tabla . " INNER JOIN " . static::$tablaJoin . " USING (". static::$idJoin .") WHERE " . static::$idJoin ." = ${id};";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift( $resultado ) ;
    }

    public static function findPhone($telefono) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE telefono = ${telefono}";

        $resultado = self::consultarSQL($query);

        return array_shift( $resultado ) ;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function allInnerJoin() {
        $query = "SELECT * FROM " . static::$tabla . " INNER JOIN " . static::$tablaJoin . " USING (". static::$idJoin .");";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function allInnerJoin2() {
        $query = "SELECT * FROM " . static::$tabla . " INNER JOIN " . static::$tablaJoin . " USING (". static::$idJoin .") INNER JOIN " . static::$tablaJoin2 . " USING (". static::$idJoin2 .")";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !empty($value)) {
            $this->$key = $value;
          }
        }
    }

    //select * from coches inner join modelos using (id_modelo) inner join marcas using (id_marca);

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        $resultado->free();
        return $array;
    }

    public static function crearObjeto($registro) {
        $objeto = new static;
        foreach($registro as $key => $value) {
            if(property_exists( $objeto, $key )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id' || $columna === 'tipo' || $columna === 'recover') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function atributosJoin() {
        $atributos = [];
        foreach(static::$columnasDBJoin as $columna) {
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function sanitizarAtributosJoin() {
        $atributos = $this->atributosJoin();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    

    public function setID($id) {
        $key = static::$idJoin;
        $this->$key = $id;
    }

    // Subida de archivos
    public function setImagen($imagen) {
        // Elimina la imagen previa
        if( !is_null($this->id) ) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Elimina el archivo
    public function borrarImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES ."/". $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES ."/". $this->imagen);
        }
    }
    //Consuta Plana de SQL (Utilizar cuando los métodos del modelo no son suficientes)
    public static function SQL($query) {
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public static function guardarSQL($query) {
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public static function eliminarSQL($query) {
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public static function randomSQL($limit) {
        $query = "SELECT * FROM ".static::$tabla." ORDER BY RAND() LIMIT ".$limit.";";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

}