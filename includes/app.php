<?php 
    include '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
    
    include 'funciones.php';
    include 'config/database.php';
    
    $db = conectarDb();

    use Model\ActiveRecord; //Siempre mantenemos la conexión con referencia a la clase padre

    ActiveRecord::setDB($db);