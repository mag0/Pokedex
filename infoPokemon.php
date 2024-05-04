<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";


if (isset($_GET['nombre'])) {
    // Obtener el nombre del Pokémon de la URL
    $nombre = $_GET['nombre'];


    $conn = mysqli_connect($servername, $username, $password, $database);


    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }


    $stmt = $conn->prepare("SELECT id, imagen, tipo, descripcion, numero FROM pokemon WHERE imagen = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $numPoke = $row["numero"];
        $tipoPoke = $row["tipo"];
        $descPoke = $row["descripcion"];
    } else {
        // Si no se encuentra el Pokémon en la base de datos, mostrar un mensaje de error
        echo '<p>Error: No se encontró información para el Pokémon ' . $nombre . '.</p>';
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona el nombre del Pokémon en la URL, mostrar un mensaje de error
    echo '<p>Error: No se proporcionó el nombre del Pokémon.</p>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="./css/headerDetalles.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">

</head>

<body>
    <?php require_once("./header.php"); ?>
    <main>
        <div class="contenedor">
            <img src="./imagenes/pokemones/<?= $numPoke ?>.png" alt="<?= $nombre ?>" class="contenedor-img">
            <div class="contenedorInfo">
                <h2 class="contenedorInfo-titulo"><?= $nombre ?> <img src="./imagenes/TipoPokemon/tipo_<?= $tipoPoke ?>.png" alt="<?= $nombre ?>" class="contenedorInfo-tipoImg"></h2>
                <p class="contenedorInfo-texto"><?= $descPoke ?></p>
            </div>
        </div>
    </main>
    <?php require_once("./footer.php") ?>
</body>

</html>

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
        align-items: centers;
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