<?php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$numero = $_POST['numero'];
$descripcion = $_POST['descripcion'];

if(isset($_FILES['imagen'])){
    $file_size = $_FILES['imagen']['size'];
    $file_tmp = $_FILES['imagen']['tmp_name'];
    $file_type = $_FILES['imagen']['type'];

    $folder = "imagenes/pokemones/";
    $file_extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    $file_name = $numero . '.' . $file_extension;

    $file_path = $folder . $file_name;

    if (file_exists($file_path)) {
        unlink($file_path);
    }

    if(move_uploaded_file($file_tmp, $file_path)){
        echo "El archivo " . $file_name . " ha sido subido exitosamente";
    } else {
        echo "Error al subir el archivo.";
    }
}else{
    echo "Por favor, seleccione un archivo";
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$sql = "UPDATE pokemon
            SET imagen = '$nombre',
                tipo = '$tipo',
                numero = '$numero',
                descripcion = '$descripcion'
            WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        header('location:/Pokedex/index.php?nombre=admin');
        exit();
    } else {
        echo "No se encontró ningún Pokémon para actualizar.";
    }
} else {
    echo "Error al actualizar el Pokémon: " . mysqli_error($conn);
}
header('location:/Pokedex/index.php?nombre=admin');
exit();

mysqli_close($conn);
?>

