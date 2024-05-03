<header class="contenedor__form">

    <div class="logo">
        <img src="imagenes/logo/LogoPokeball.png" alt="logo">
        <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
    </div>

    <form class="form" action="/Pokedex/inicioSesion.php" method="POST">
        <input type="text" placeholder="Usuario" id="username" class="form__input" name="usuario">
        <input type="password" placeholder="Contraseña" id="password" class="form__input" name="pass">
        <button type="submit" class="form__input-button">Ingresar</button>
        <?php
        if ( isset($_GET['error'])){
            echo "<div style='background-color: aquamarine;color:red; padding: .2em; text-align: center' >Usuario y contraseña invalidos </div> ";
        }
        ?>
    </form>


</header>
