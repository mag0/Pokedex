<?php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
//$imagen = $_POST['imagen'];
$tipo = $_POST['tipo'];
$numero = $_POST['numero'];
$descripcion = $_POST['descripcion'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Actualizar o insertar el Pokémon
$sql = "UPDATE pokemon
            SET imagen = '$nombre',
                tipo = '$tipo',
                numero = '$numero',
                descripcion = '$descripcion'
            WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        header('location:/Pokedex/index.php?nombre=admin');
    } else {
        echo "No se encontró ningún Pokémon para actualizar.";
    }
} else {
    echo "Error al actualizar el Pokémon: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>

