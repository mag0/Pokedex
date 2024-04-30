<?php
$directorio = './imagenes/pokemones';
$nuevoNombre = 'nuevo_nombre';

// Obtener una lista de archivos en el directorio
$archivos = scandir($directorio);

// Eliminar . y .. del array de archivos
$archivos = array_diff($archivos, array('.', '..'));

// Recorrer cada archivo y renombrarlo
foreach ($archivos as $archivo) {
    $rutaCompletaArchivoAntiguo = $directorio . '/' . $archivo;
    $rutaCompletaArchivoNuevo = $directorio . '/' . $nuevoNombre . '.webp';

    // Renombrar el archivo
    if (rename($rutaCompletaArchivoAntiguo, $rutaCompletaArchivoNuevo)) {
        echo "Archivo $archivo renombrado correctamente.<br>";
    } else {
        echo "Error al intentar renombrar el archivo $archivo.<br>";
    }
}
header('location:/Pokedex/index.php');
exit();
