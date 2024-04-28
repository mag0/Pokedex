<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="/Pokedex/css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
<main>

    <header class="contenedor__form">
        <div class="logo">
            <img style="width: 5em; height: 5em" src="imagenes/logo/LogoPokeball.png" alt="logo">
            <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
        </div>
        <a style="color: black" href="#">
            <img src="imagenes/logo/user.png" alt="">
            <?php
                $nombre = $_GET['nombre'];
                echo '<h2>'.$nombre.'</h2>';
            ?>
        </a>
    </header>

    <section class="buscador">
            <form action="pokemonBuscado.php?admin=admin" method="POST">
                <input type="text" class="pokemon" name="pokemonesBusqueda" placeholder="Ingrese el nombre, tipo o número de pokémon">
                <input class="quienes" type="submit" value="Quien es este pokemon?">
            </form>
    </section>

    <?php
    if ( isset($_GET['error'])){
        switch ($_GET["error"]){
            case 1:
                echo "<div style='background-color: aquamarine;color:red' >Usuario y contraseña invalidos </div> ";
                break;
            case 2:
                echo "<div style='background-color: aquamarine;color:red' >Debe completar los datos </div> ";
                break;
            case 3:
                echo "<div style='background-color: aquamarine;color:red' >LTA </div> ";
                break;
            case 4:
                echo "<div style='background-color: aquamarine;color:red' >No se encontro el pokemon </div> ";
                break;
        }
    }
    ?>

    <section class="tabla">
        <table>
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once ('./pokemonesAdmin.php');
            ?>
            </tbody>
        </table>
    </section>
    <div class="div-boton"><button class="nuevoPokemon"><a style="text-decoration: none; color: white" href="/Pokedex/formulario.php">Nuevo Pokémon</a></button></div>
</main>
<?php
require_once ('./footer.php');
?>
</body>

</html>
