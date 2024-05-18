<?php
include_once("helper/Database.php");
$config = parse_ini_file('config/config.ini');

$database = new Database($config['servername'], $config['username'], $config['password'], $config['dbname']);

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];

    $database = new Database($config['servername'], $config['username'], $config['password'], $config['dbname']);

    $sql = "SELECT id, imagen, tipo, descripcion, numero FROM pokemon WHERE imagen = '$nombre'";
    $result = $database->query($sql);
    if (!empty($result)) {
        $row = $result[0];

        $numPoke = $row["numero"];
        $tipoPoke = $row["tipo"];
        $descPoke = $row["descripcion"];
    } else {
        echo '<p>Error: No se encontró información para el Pokémon ' . $nombre . '.</p>';
    }
} else {
    echo '<p>Error: No se proporcionó el nombre del Pokémon.</p>';
}
require_once ("templates/header.php");
?>


    <main>
        <div class="contenedor">
            <img src="./imagenes/pokemones/<?= $numPoke ?>.png" alt="<?= $nombre ?>" class="contenedor-img">
            <div class="contenedorInfo">
                <h2 class="contenedorInfo-titulo"><?= $nombre ?> <img src="./imagenes/TipoPokemon/tipo_<?= $tipoPoke ?>.png" alt="<?= $nombre ?>" class="contenedorInfo-tipoImg"></h2>
                <p class="contenedorInfo-texto"><?= $descPoke ?></p>
            </div>
        </div>
    </main>
<?php
require_once ("templates/footer.php")
?>
<style>
    body {
        margin: 0;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        min-height: 100vh;
        position: relative;
        margin-top: auto;
        margin-bottom: auto;
    }


    .contenedor {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        padding-bottom: 100px;
    }

    .contenedor-img {
        width: 300px;
    }

    .contenedorInfo {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contenedorInfo-tipoImg {
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .contenedorInfo-titulo {
        font-size: 40px;
        text-align: center;
    }

    .contenedorInfo-texto {
        font-size: 24px;
    }

    @media screen and (max-width: 600px) {
        .contenedor {
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    }
</style>