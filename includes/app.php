<?php 
    include 'funciones.php';
    include 'config/database.php';
    include '../vendor/autoload.php';
    $db = conectarDb();

    use Model\ActiveRecord; //Siempre mantenemos la conexión con referencia a la clase padre

    ActiveRecord::setDB($db);