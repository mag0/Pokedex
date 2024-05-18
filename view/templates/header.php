<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php
    echo '<header class="contenedor__form">
        <div class="logo">
            <img style="width: 5em; height: 5em" src="imagenes/logo/LogoPokeball.png" alt="logo">
            <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
        </div>';
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        echo '<div style="color: black; text-align: center">
            <img src="imagenes/logo/user.png" alt="">
            <h2>' .$nombre. '</h2>
            <a href="/Pokedex/index.php" style="border: 1px solid black; padding: .1em; text-decoration: none; color: black">Cerrar Sesión</a>
        </div>';
    }else{
        echo '<form class="form" action="/Pokedex/inicioSesion.php" method="POST">
            <input type="text" placeholder="Usuario" id="username" class="form__input" name="usuario">
            <input type="password" placeholder="Contraseña" id="password" class="form__input" name="pass">
        <button type="submit" class="form__input-button">Ingresar</button>';
        if ( isset($_GET['error'])){
            echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
        }
    echo '</form>';
    }

    echo '</header>
    <main>';
    ?>

