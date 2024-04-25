<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="/Pokedex/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
<main>

    <?php
        require_once ('./header.php');
        if ( isset($_GET['error'])){
            $error = $_GET['error'];
            echo $error;
        }
    ?>

    <section class="buscador">
        <form action="buscador.php" method="GET">
            <input type="text" class="pokemon" name="pokemon"
                   placeholder="Ingrese el nombre, tipo o número de pokémon">
            <input class="quienes" type="search" value="Quien es este pokemon?">
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
            </tr>
            </thead>
            <tbody>
            <?php
            require_once ('./pokemones.php');
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
