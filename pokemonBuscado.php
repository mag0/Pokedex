<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="/Pokedex/css/style.css">
    <link rel="stylesheet" href="/Pokedex/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
<main>

    <?php
    require_once ('./header.php');
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

    <section class="buscador">
        <form action="pokemonBuscado.php?admin=admin" method="POST">
            <input type="text" class="pokemon" name="pokemonesBusqueda" placeholder="Ingrese el nombre, tipo o número de pokémon">
            <input class="quienes" type="submit" value="Quien es este pokemon?">
        </form>
    </section>

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
            if(isset($_GET['admin'])){
                require_once ('./buscadorAdmin.php');
            }else{
                require_once ('./buscador.php');
            }
            ?>
            </tbody>
        </table>

    </section>

    <div class="div-boton"><button class="nuevoPokemon">Nuevo Pokémon</button></div>

</main>

<?php
require_once ('./footer.php');
?>
</body>

</html>
