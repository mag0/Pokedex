<?php
if(isset($_GET['nombre'])){
    buscarPokemonAdmin();
}else{
    buscarPokemon();
}

function buscarPokemonAdmin()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokemones";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    if (isset($_POST['pokemonesBusqueda'])) {
        $pokemonesRequerido = $_POST['pokemonesBusqueda'];

        $sql = "SELECT * FROM pokemon 
         WHERE imagen LIKE '%" . $pokemonesRequerido . "%'
         OR tipo LIKE '%" . $pokemonesRequerido . "%'
         OR numero = '" . $pokemonesRequerido . "'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre='.$row["imagen"].'&admin=admin"><img class="img_p"
                        src="/Pokedex/imagenes/pokemones/'.$row["numero"].'.png?'.time().'"
                        alt="'.$row["imagen"].'"></a></td>
                <td data-label="Imagen"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $row["tipo"] . '_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $row["tipo"] . '.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">' . $row["numero"] . '</td>
                <td data-label="Nombre">' . $row["imagen"] . '</td>
                <td data-label="Acciones" class="action-buttons">
                    <a href="/Pokedex/formulario.php?id=' . $row["id"] . 'nombre=' . $row["imagen"] . 'tipo=' . $row["tipo"] . 'numero=' . $row["numero"] . '"><button>Modificar</button></a>
                    <a href="/Pokedex/eliminarPokemon.php?id=' . $row["id"] . '"><button>Eliminar</button></a>
                </td>
            </tr>';
            }
        } else {
            header('location:/Pokedex/index.php?error=4&nombre=Admin');
            exit();
        }
    } else {
        header('location:/Pokedex/index.php?error=4&nombre=Admin');
        exit();
    }
    $conn->close();
}

function buscarPokemon()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokemones";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    if(isset($_POST['pokemonesBusqueda'])) {
        $pokemonesRequerido = $_POST['pokemonesBusqueda'];

        // Realizar consulta
        $sql = "SELECT * FROM pokemon 
         WHERE imagen LIKE '%" . $pokemonesRequerido . "%'
         OR tipo LIKE '%" . $pokemonesRequerido . "%'
         OR numero = '" . $pokemonesRequerido . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Imprimir los datos de cada Pokémon
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre='.$row["imagen"].'"><img class="img_p"
                        src="/Pokedex/imagenes/pokemones/'.$row["numero"].'.png?'.time().'"
                        alt="'.$row["imagen"].'"></a></td>
                <td data-label="Imagen"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $row["tipo"] . '_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $row["tipo"] . '.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">' . $row["numero"] . '</td>
                <td data-label="Nombre">' . $row["imagen"] . '</td>
            </tr>';
            }
        } else {
            header('location:/Pokedex/index.php?error=4');
            exit();
        }
    }else{
        header('location:/Pokedex/index.php?error=4');
        exit();
    }
    $conn->close();
}

