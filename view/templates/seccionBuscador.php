<section class="buscador">
        <?php
        if(isset($_GET['nombre'])){
            echo '<form action="pokemonBuscado.php?nombre=Admin" method="POST">';
        }else{
            echo '<form action="pokemonBuscado.php" method="POST">';
        }
        ?>
            <input type="text" class="pokemon" name="pokemonesBusqueda" placeholder="Ingrese el nombre, tipo o número de pokémon">
            <input class="quienes" type="submit" value="Quien es este pokemon?">
        </form>
    </section>
<?php
if ( isset($_GET['error'])){
    switch ($_GET["error"]){
        case 2:
            echo "<div style='background-color: aquamarine;color:red' >Debe completar los datos </div> ";
            break;
        case 4:
            echo "<div style='background-color: aquamarine;color:red' >No se encontro el pokemon </div> ";
            break;
    }
}
?>