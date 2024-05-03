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

    // Obtener el número del Pokémon que se va a eliminar
    $sql_numero_pokemon = "SELECT numero FROM pokemon WHERE id = $id";
    $resultado_numero_pokemon = mysqli_query($conn, $sql_numero_pokemon);

    if ($resultado_numero_pokemon && mysqli_num_rows($resultado_numero_pokemon) > 0) {
        $fila = mysqli_fetch_assoc($resultado_numero_pokemon);
        $numero_pokemon = $fila["numero"];

        // Construir la ruta completa del archivo de imagen
        $ruta_imagen = "imagenes/pokemones/" . $numero_pokemon . ".png";

        // Verificar si el archivo de imagen existe y eliminarlo
        if (file_exists($ruta_imagen)) {
            if (unlink($ruta_imagen)) {
                echo "Imagen del Pokémon eliminada exitosamente.";
            } else {
                echo "Error al eliminar la imagen del Pokémon.";
            }
        } else {
            echo "El archivo de imagen del Pokémon no existe.";
        }
    } else {
        echo "No se pudo obtener el número del Pokémon.";
    }

    // Realizar consulta para eliminar el Pokémon
    $sql_eliminar = "DELETE FROM pokemon WHERE id = $id";

    if (mysqli_query($conn, $sql_eliminar)) {
        echo "Pokémon eliminado exitosamente.";
    } else {
        echo "Error al eliminar el Pokémon: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);

    header('location:/Pokedex/index.php?nombre=Admin');
    exit();
} else {
    echo "Error: No se proporcionó el ID del Pokémon a eliminar.";
}
?>

