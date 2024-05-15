<?php
include_once('header.php');

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    echo '<div style="color: black; text-align: center">
        <img src="imagenes/logo/user.png" alt="">
        <h2>' . $nombre . '</h2>
        <a href="/Pokedex/index.php" style="border: 1px solid black; padding: .1em; text-decoration: none; color: black">Cerrar Sesión</a>
    </div>';
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
    }
}
if (isset($_GET['error'])) {
    if ($_GET["error"]==5) {
        echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Ya existe un pokemon con ese nombre o numero</div> ";
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $tipo = $_GET['tipo'];
    $numero = $_GET['numero'];
    $descripcion = $_GET['descripcion'];
    $total_pokemones = $_GET['pokemonesTotales'];
    echo '<main>
    <section class="formulario">
        <h2>Nuevo Pokémon</h2>
        <form action="modificarPokemon.php?numero1='.$numero.'" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value='.$id.'>
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="'.$nombre.'">
            </div>
            <div class="input-group">
                <label for="tipo">Imagen (solo archivos PNG):</label>
                <input type="file" id="imagen" name="imagen" accept="image/png">
            </div>
            <div class="input-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" value="'.$tipo.'" name="tipo" accept=".txt">
            </div>
            <div class="input-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="'.$numero .' o mayor a '.$total_pokemones.'">
            </div>
            <div class="input-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" value="'.$descripcion.'">
            </div>
            <div class="input-group">
                <button type="submit">Modificar Pokemón</button>
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
                <label for="tipo">Imagen (solo archivos PNG):</label>
                <input type="file" id="imagen" name="imagen" accept="image/png">
            </div>
            <div class="input-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" placeholder="Ejemplo: Planta" required>
            </div>
            <div class="input-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="Ejemplo: 160" required>
            </div>
            <div class="input-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion corta del pokemon" required>
            </div>
            <div class="input-group">
                <button type="submit">Agregar Pokémon</button>
            </div>
        </form>
    </section>
</main>';
}
?>
</body>
</html>

<?php
include_once("footer.php");
?>