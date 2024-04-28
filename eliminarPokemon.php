<?php
if (isset($_GET["id"])) {
// Obtener el ID del Pokémon a eliminar
$id = $_GET["id"];
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

// Realizar consulta
    $sql = "DELETE FROM pokemon WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Pokémon eliminado exitosamente.";
    } else {
        echo "Error al eliminar el Pokémon: " . mysqli_error($conn);
    }

// Cerrar la conexión
$conn->close();
    header('location:/Pokedex/indexAdmin.php?nombre=Admin');
    exit();
}else {
    echo "Error: No se proporcionó el ID del Pokémon a eliminar.";
}

?>
