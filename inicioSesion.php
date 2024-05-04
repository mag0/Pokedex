<?php
session_start();

if ( isset($_POST["usuario"]) &&  isset($_POST["pass"]) ){
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $esValido = consultarBD($usuario, $pass);

    if($esValido){
        $_SESSION["usuario"] = $usuario;

        header("location:index.php?nombre=Admin");
        exit();
    } else {
        header("location:index.php?error=1");
        exit();
    }

} else {
    header("location:index.php?error=2");
    exit();
}

function consultarBD($usuario, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokemones";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM login WHERE usuario = '" . $usuario . "' && pass = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result) == 1;

    $conn->close();
}