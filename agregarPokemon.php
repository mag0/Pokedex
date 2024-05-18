<?php
include_once("helper/Database.php");

$config = parse_ini_file('config/config.ini');
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$numero = $_POST["numero"];
$descripcion = $_POST["descripcion"];

$database = new Database($config['servername'], $config['username'], $config['password'], $config['dbname']);

$resultado_verificar = $database->queryPersonal("SELECT * FROM pokemon WHERE imagen = '$nombre' OR numero = '$numero'");

if ($resultado_verificar && $resultado_verificar->num_rows > 0) {
    echo "Error: Ya existe un Pokémon con el nombre '$nombre'.";
    header('Location: /Pokedex/formulario.php?nombre=Admin&error=5');
    exit();
} else {
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
            exit();
        }
    } else {
        echo "Por favor, seleccione un archivo";
        exit();
    }

    $sql_insertar = "INSERT INTO pokemon (imagen, tipo, numero, descripcion) VALUES ('$nombre', '$tipo', '$numero', '$descripcion')";

    if ($database->executePersonal($sql_insertar)) {
        echo "Pokémon creado exitosamente.";
        header('Location: /Pokedex/index.php?nombre=Admin');
        exit();
    } else {
        echo "Error al crear el Pokémon: " . $database->getLastError();
    }
}
?>
