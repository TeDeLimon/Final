<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final</title>
    <link href="build/css/app.css" rel="stylesheet">

</head>
<body>
    <header class="header">
        <nav class="navegacion">
            <a class="logo" href="/"><img src="build/img/logo.png" alt="Logo de la página web"></a>
            <div id="menu"><img class="barras" src="build/img/barras.svg" alt="Barras de la página web"></div>
            <?php if (isset($_SESSION['logged'])) {  ?>
                <div><a href="/bookings"><img class="user" src="build/img/user.png" alt="Logo usuario de la página web"></a></div>
            <?php
            } else { ?>
                <div><a href="/user"><img class="user" src="build/img/user.png" alt="Logo usuario de la página web"></a></div>
            <?php } ?>
        </nav>
        <nav>
            <ul id="mobile-menu" class="activo">
                <li><a href="/login">Regístrate</a></li>
                <li><a href="/bookings">Tus Reservas</a></li>
                <li><a href="/reservas">Reservas</a></li>
                <li><a href="/carta">Carta</a></li>
                <li><a href="/contacto">Nosotros</a></li>
            </ul>
        </nav>
    </header>
    