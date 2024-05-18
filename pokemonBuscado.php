<?php require_once('templates/header.php');?>

<?php require_once('templates/seccionBuscador.php');?>


<?php
    if ( isset($_GET['error'])){
        switch ($_GET["error"]){
            case 1:
                echo "<div style='background-color: aquamarine;color:red' >Usuario y contraseña invalidos </div> ";
                break;
            case 2:
                echo "<div style='background-color: aquamarine;color:red' >Debe completar los datos </div> ";
                break;
            case 3:
                echo "<div style='background-color: aquamarine;color:red' >LTA </div> ";
                break;
            case 4:
                echo "<div style='background-color: aquamarine;color:red' >No se encontro el pokemon </div> ";
                break;
        }
    }

    ?>

    <section class="tabla">
        <table>
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <?php
                if(isset($_GET['nombre'])){
                    echo '<th>Acciones</th>';
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
                require_once ('./buscador.php')
            ?>
            </tbody>
        </table>

    </section>

    <?php
    if(isset($_GET['nombre'])){
        echo '<div class="div-boton">
            <button class="nuevoPokemon">
                <a style="text-decoration: none; color: white" href="/Pokedex/formulario.php?nombre=admin">Nuevo Pokémon</a>
            </button>
            </div>';
    }
    ?>
<?php require_once('templates/footer.php');?>

