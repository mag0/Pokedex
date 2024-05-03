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
$sql_verificar = "SELECT * FROM pokemon WHERE imagen = '$nombre' OR numero = '$numero'";
$resultado_verificar = mysqli_query($conn, $sql_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    echo "Error: Ya existe un Pokémon con el nombre '$nombre'.";
    header('Location: /Pokedex/formulario.php?nombre=Admin&error=5');
    exit();
} else {
    // Manejar la carga del archivo de imagen solo si el Pokémon no existe
    if(isset($_FILES['imagen'])){
        $file_size = $_FILES['imagen']['size'];
        $file_tmp = $_FILES['imagen']['tmp_name'];
        $file_type = $_FILES['imagen']['type'];

        $folder = "imagenes/pokemones/";
        $file_extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
        $file_name = $numero . '.' . $file_extension;

        $file_path = $folder . $file_name;

        if(move_uploaded_file($file_tmp, $file_path)){
            echo "El archivo " . $file_name . " ha sido subido exitosamente";
        } else {
            echo "Error al subir el archivo.";
            exit(); // Detener la ejecución del script si hay un error en la carga del archivo
        }
    } else {
        echo "Por favor, seleccione un archivo";
        exit(); // Detener la ejecución del script si no se proporciona ningún archivo
    }

    // Realizar la inserción del Pokémon en la base de datos
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
