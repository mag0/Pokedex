<?php
include_once('header.php');

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    echo '<div style="color: black; text-align: center">
        <img src="imagenes/logo/user.png" alt="">
        <h2>' . $nombre . '</h2>
        <a href="/Pokedex/index.php" style="border: 1px solid black; padding: .1em; text-decoration: none; color: black">Cerrar Sesión</a>
    </div>';
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
    }
} else {
    ?>

    <form class="form" action="/Pokedex/inicioSesion.php" method="POST">
        <input type="text" placeholder="Usuario" id="username" class="form__input" name="usuario">
        <input type="password" placeholder="Contraseña" id="password" class="form__input" name="pass">
        <button type="submit" class="form__input-button">Ingresar</button>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
        }
        ?>
    </form>
    <?php
}
?>
<main>
    <section class="buscador">
        <?php
        if (isset($_GET['nombre'])) {
            echo '<form action="pokemonBuscado.php?nombre=Admin" method="POST">';
        } else {
            echo '<form action="pokemonBuscado.php" method="POST">';
        }
        ?>
        <input type="text" class="pokemon" name="pokemonesBusqueda"
               placeholder="Ingrese el nombre, tipo o número de pokémon">
        <input class="quienes" type="submit" value="Quien es este pokemon?">
        </form>
    </section>

    <?php
    if (isset($_GET['error'])) {
        switch ($_GET["error"]) {
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
                if (isset($_GET['nombre'])) {
                    echo '<th>Acciones</th>';
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once('./pokemones.php');
            ?>
            </tbody>
        </table>

    </section>
    <?php
    if (isset($_GET['nombre'])) {
        echo '<div class="div-boton">
            <a class="nuevoPokemon" style="text-decoration: none; color: white; text-align: center" href="/Pokedex/formulario.php?nombre=Admin" >
                Nuevo Pokémon
            </a>
            </div>';

    }
    ?>
</main>
</body>
</html>

<?php
include_once("footer.php");
?>