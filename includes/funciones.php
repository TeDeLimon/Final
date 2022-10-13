<?php

define('FUNCIONES_URL', __DIR__ . "/funciones/funciones.php");
define('TEMPLATES_URL', __DIR__ . "/templates");
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/build/imagenes');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado()  {
    session_start();
    if(!$_SESSION['logged']) {
        header('Location: /');
    }
}

function debuggear($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

//Escapa/Sanitizar el HTML
function s($html) {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido 
function validarTipoContenido($tipo) {
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($mensaje) {
    switch($mensaje) {
        case 1: 
            $mensaje = 'Creado Correctamente';
            break;
        case 2: 
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3: 
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url) {
    $id =  $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header("Location: ${url}");
    }   
    return $id;
}

function validarORedireccionarPOST(string $url) {
    $id =  $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header("Location: ${url}");
    }   
    return $id;
}