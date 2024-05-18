
<?php
include_once("pokemones.php");

$pokemones = obtenerPokemones();
$total_pokemones = obtenerPokemonesTotales();

echo '<section class="tabla">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>';
if (isset($_GET['nombre'])) {
    echo '<th>Acciones</th>';
}
echo '</tr>
            </thead>
            <tbody>';

if (!empty($pokemones)) {
    foreach ($pokemones as $pokemon) {
        echo '<tr>
                <td data-label="Imagen"><a href="/Pokedex/infoPokemon.php?nombre=' . $pokemon["imagen"] . '"><img class="img_p"
                        src="/Pokedex/imagenes/pokemones/' . $pokemon["numero"] . '.png?' . time() . '"
                        alt="' . $pokemon["imagen"] . '"></a></td>
                <td data-label="Imagen"><img class="img_p"
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $pokemon["tipo"] . '_icono.png"
                            alt="Bulbasaur"><img
                            src="/Pokedex/imagenes/TipoPokemon/tipo_' . $pokemon["tipo"] . '.png"
                            alt="Bulbasaur"></td>
                <td data-label="Número">' . $pokemon["numero"] . '</td>
                <td data-label="Nombre">' . $pokemon["imagen"] . '</td>';
        if (isset($_GET['nombre'])) {
            echo '<td data-label="Acciones" class="action-buttons">
                        <a href="/Pokedex/formulario.php?id=' . $pokemon["id"] . '&nombre=' . $pokemon["imagen"] . '&tipo=' . $pokemon["tipo"] . '&numero=' . $pokemon["numero"] . '&descripcion=' . $pokemon["descripcion"] . '&pokemonesTotales=' . $total_pokemones . '&admin=admin."><button>Modificar</button></a>
                        <a href="/Pokedex/eliminarPokemon.php?id=' . $pokemon["id"] . '"><button>Eliminar</button></a>
                    </td>';
        }
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No hay pokemones.</td></tr>';
}

echo '</tbody>
    </table>
</section>';
?>