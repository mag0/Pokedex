<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
<?php
require_once ('./header.php');
if(isset($_GET['id'])){
    $nombre = $_GET['nombre'];
    $tipo = $_GET['tipo'];
    $numero = $_GET['numero'];
    echo '<main>
    <section class="formulario">
        <h2>Nuevo Pokémon</h2>
        <form action="modificarPokemon.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="'.$nombre.'">
            </div>
            <div class="input-group">
                <label for="tipo">Tipo:</label>
                <input type="file" id="tipo" name="tipo" accept=".txt">
            </div>
            <div class="input-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="'.$numero.'">
            </div>
            <div class="input-group">
                <button type="submit">Agregar Pokémon</button>
            </div>
        </form>
    </section>
</main>';
}else{
    echo '<main>
    <section class="formulario">
        <h2>Nuevo Pokémon</h2>
        <form action="agregarPokemon.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ejemplo: Pikachu" required>
            </div>
            <div class="input-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" placeholder="Ejemplo: Planta" required>
            </div>
            <div class="input-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="Con el numero se cargara la imagen" required>
            </div>
            <div class="input-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion" required>
            </div>
            <div class="input-group">
                <button type="submit">Agregar Pokémon</button>
            </div>
        </form>
    </section>
</main>';
}

if (isset($_GET['error'])) {
    switch ($_GET["error"]) {
        case 5:
            echo "<div style='background-color: aquamarine;color:red' >Ya existe un pokemon con ese nombre </div> ";
            break;

    }
}
?>



<?php
require_once ('./footer.php');
?>
</body>

</html>
