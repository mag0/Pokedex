<?php

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
$sql = "SELECT * FROM pokemon";

$result = mysqli_query($conn, $sql);

// Cerrar la conexión
$conn->close();
header('location:/Pokedex/indexAdmin.php?nombre=Admin');
exit();
?>
