<?php
function obtenerPokemonesTotales()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokemones";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    $sql = "SELECT COUNT(*) AS total_pokemones FROM pokemon";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_pokemones = $row['total_pokemones'];
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conn);
    }

// Cerrar la conexión
    mysqli_close($conn);

    return $total_pokemones;
}
$total_pokemones = obtenerPokemonesTotales();
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

    $sql = "SELECT * FROM pokemon";

$result = mysqli_query($conn, $sql);

$cantidadPokemones= 0;

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if(isset($_GET['nombre'])){
            echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre='.$row["imagen"].'&admin=admin"><img class="img_p"
                        src="/Pokedex/imagenes/pokemones/'.$row["numero"].'.png?'.time().'"
                        alt="'.$row["imagen"].'"></a></td>
                <td data-label="Imagen"><img class="img_p"
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">'.$row["numero"].'</td>
                <td data-label="Nombre">'.$row["imagen"].'</td>
                <td data-label="Acciones" class="action-buttons">
                    <a href="/Pokedex/formulario.php?id='.$row["id"].'&nombre='.$row["imagen"].'&tipo='.$row["tipo"].'&numero='.$row["numero"].'&descripcion='.$row["descripcion"].'&pokemonesTotales='.$total_pokemones.'&admin=admin."><button>Modificar</button></a>
                    <a href="/Pokedex/eliminarPokemon.php?id='.$row["id"].'"><button>Eliminar</button></a>
                </td>
            </tr>';
        }else{
            echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre='.$row["imagen"].'"><img class="img_p"
                        src="/Pokedex/imagenes/pokemones/'.$row["numero"].'.png?'.time().'"
                        alt="'.$row["imagen"].'"></a></td>
                <td data-label="Imagen"><img class="img_p"
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_'. $row["tipo"].'.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">'.$row["numero"].'</td>
                <td data-label="Nombre">'.$row["imagen"].'</td>
            </tr>';
        }
    }
} else {
    echo 'no hay pokemones';
}

$conn->close();
?>
