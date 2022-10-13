<?php

function conectarDb(): mysqli
{ //Lo cambiamos a forma de objetos en lugar de la de funciones
    $db = new mysqli('localhost', 'root', 'root', 'proyecto_final');

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        echo "error de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        exit;
    }
    return $db;
}