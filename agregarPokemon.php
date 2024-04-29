<?php

$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$numero = $_POST["numero"];
$descripcion = $_POST["descripcion"];

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

// Verificar si el Pokémon ya existe
$sql_verificar = "SELECT * FROM pokemon WHERE imagen = '$nombre'";
$resultado_verificar = mysqli_query($conn, $sql_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    echo "Error: Ya existe un Pokémon con el nombre '$nombre'.";
    header('Location: /Pokedex/formulario.php?nombre=Admin&error=5');
    exit();
} else {
    // Realizar la inserción si el Pokémon no existe
    $sql_insertar = "INSERT INTO pokemon (imagen, tipo, numero, descripcion) VALUES ('$nombre', '$tipo', '$numero', '$descripcion')";

    if (mysqli_query($conn, $sql_insertar)) {
        echo "Pokémon creado exitosamente.";
        header('Location: /Pokedex/index.php?nombre=Admin');
        exit();
    } else {
        echo "Error al crear el Pokémon: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
$conn->close();

?>

