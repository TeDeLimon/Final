<?php

function conectarDb(): mysqli
{ //Lo cambiamos a forma de objetos en lugar de la de funciones
    $db = new mysqli(
        $_ENV['DB_HOST'], 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS'], 
        $_ENV['DB_BD']
    );
    $mysqli->set_charset("utf8mb4");

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        echo "error de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        exit;
    }
    return $db;
}