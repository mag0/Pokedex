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
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/pokemonDetalles.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">

</head>

<body>
    <?php if(isset($_GET['admin'])){
        $admin = $_GET['admin'];
        $nombre = $_GET['nombre'];
        echo '<header class="contenedor__form">
        <div class="logo">
            <img style="width: 5em; height: 5em" src="imagenes/logo/LogoPokeball.png" alt="logo">
            <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
        </div>
        <div style="color: black; text-align: center">
            <img src="imagenes/logo/user.png" alt="">
            <h2>'.$admin.'</h2>
            <a href="/Pokedex/index.php" style="border: 1px solid black; padding: .1em; text-decoration: none; color: black">Cerrar Sesión</a>
        </div>';
        if ( isset($_GET['error']) &&$_GET['error']==1){
            echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
        }
        echo '</header>';

    }else{
        require_once ('./header.php');
    }?>
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