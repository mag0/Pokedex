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

if (mysqli_num_rows($result) > 0) {
    // Imprimir los datos de cada Pokémon
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre='.$row["imagen"].'"><img
                        src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$row["id"].'.png"
                        alt="Bulbasaur"></a></td>
                <td data-label="Imagen"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">'.$row["numero"].'</td>
                <td data-label="Nombre">'.$row["imagen"].'</td>
            </tr>';
    }
} else {
    echo 'no hay pokemones';
}

// Cerrar la conexión
$conn->close();
?>
