<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="/Pokedex/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
<main>

    <section class="buscador">
        <form action="">
            <input type="text" class="pokemon" name="pokemon"
                   placeholder="Ingrese el nombre, tipo o número de pokémon">
            <input class="quienes" type="submit" value="Quien es este pokemon?">
        </form>
    </section>

    <section class="tabla">
        <table>
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="Imagen"><img
                        src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png"
                        alt="Bulbasaur"></td>
                <td data-label="Tipo">Planta / Veneno</td>
                <td data-label="Número">001</td>
                <td data-label="Nombre">Bulbasaur</td>
                <td data-label="Acciones" class="action-buttons">
                    <button>Modificar</button>
                    <button>Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </section>
</main>
</body>

</html>
