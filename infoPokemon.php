<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="./css/headerDetalles.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>

<?php
require_once ('./header.php');

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

echo '<td>
    <img class="contenedor__porkemon" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$row["numero"].'.png"></td>';
    echo '<div class="type-container">';
echo '<td>
        <img class="tipo__pokemon" src="/Pokedex/imagenes/TipoPokemon/tipo_'.$row["tipo"].'_icono.png">
      </td>';
        echo '<td><p class="nombre__pokemon">'.$nombre.'</p></td>';
        echo '<p class="descrip__pokemon">'.$row["descripcion"].'</p>';

} else {
// Si no se encuentra el Pokémon en la base de datos, mostrar un mensaje de error
echo '<p>Error: No se encontró información para el Pokémon '.$nombre.'.</p>';
}

// Cerrar la conexión
$conn->close();
} else {
// Si no se proporciona el nombre del Pokémon en la URL, mostrar un mensaje de error
echo '<p>Error: No se proporcionó el nombre del Pokémon.</p>';
}

require_once ('./footer.php');
?>

</body>
</html>