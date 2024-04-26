<header class="contenedor__form">

    <div class="logo">
        <img style="width: 5em; height: 5em" src="imagenes/logo/LogoPokeball.png" alt="logo">
        <h1 style="margin-left: 2em" class="pokedex-title">Pokedex</h1>
    </div>

    <form class="form" action="/Pokedex/inicioSesion.php" method="POST">
        <input type="text" placeholder="Usuario" id="username" class="form__input" name="usuario">
        <input type="password" placeholder="Contraseña" id="password" class="form__input" name="pass">
        <button type="submit" class="form__input-button">Ingresar</button>
    </form>

</header>
