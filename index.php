<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
<main>

    <?php
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        echo '<header class="contenedor__form">
        <div class="logo">
            <img style="width: 5em; height: 5em" src="imagenes/logo/LogoPokeball.png" alt="logo">
            <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
        </div>
        <div style="color: black; text-align: center">
            <img src="imagenes/logo/user.png" alt="">
            <h2>'.$nombre.'</h2>
            <a href="/Pokedex/index.php" style="border: 1px solid black; padding: .1em; text-decoration: none; color: black">Cerrar Sesión</a>
        </div>';
        if ( isset($_GET['error']) &&$_GET['error']==1){
            echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
        }
    echo '</header>';

    }else{
        require_once ('./header.php');
    }

    ?>

    <section class="buscador">
        <?php
        if(isset($_GET['nombre'])){
            echo '<form action="pokemonBuscado.php?nombre=Admin" method="POST">';
        }else{
            echo '<form action="pokemonBuscado.php" method="POST">';
        }
        ?>
            <input type="text" class="pokemon" name="pokemonesBusqueda" placeholder="Ingrese el nombre, tipo o número de pokémon">
            <input class="quienes" type="submit" value="Quien es este pokemon?">
        </form>
    </section>

    <?php
    if ( isset($_GET['error'])){
        switch ($_GET["error"]){
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
                <?php
                if(isset($_GET['nombre'])){
                    echo '<th>Acciones</th>';
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
                require_once ('./pokemones.php');
            ?>
            </tbody>
        </table>

    </section>
    <?php
    if(isset($_GET['nombre'])){
    echo '<div class="div-boton">
            <a class="nuevoPokemon" style="text-decoration: none; color: white; text-align: center" href="/Pokedex/formulario.php?nombre=Admin" >
                Nuevo Pokémon
            </a>
            </div>';

    }
    ?>
</main>

<?php
require_once ('./footer.php');
?>
</body>

</html>
