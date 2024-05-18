<?php
include_once ("helper/Database.php");
function obtenerPokemonesTotales()
{

    $config = parse_ini_file('config/config.ini');

    $servername = $config['servername'];
    $username = $config['username'];
    $dbname = $config['dbname'];
    $password = $config['password'];

    $database = new Database($servername, $username, $password, $dbname);
    $result = $database->queryPersonal("SELECT COUNT(*) AS total_pokemones FROM pokemon");

    if ($result) {
        $row = $result->fetch_assoc();
        $total_pokemones = $row['total_pokemones'];
    } else {
        $total_pokemones = 0;
    }

    return $total_pokemones;
}

function obtenerPokemones()
{
    $config = parse_ini_file('config/config.ini');

    $servername = $config['servername'];
    $username = $config['username'];
    $database = $config['dbname'];
    $password = $config['password'];

    $database = new Database($servername, $username, $password, $database);
    $result = $database->queryPersonal("SELECT * FROM pokemon");

    $pokemones = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pokemones[] = $row;
        }
    }

    return $pokemones;
}
?>
