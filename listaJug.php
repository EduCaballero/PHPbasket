<?php

/* 
 * Fichero que ejecutará la consulta de listado alumnos
 * y mostrará el resultado por pantalla
 * 
 */

// Incluimos fichero de funciones de bbdd
require_once 'bbdd.php';

// Llamamos a la función que ejecuta la consulta
$resultado = selectAllJugadores();
// Mostramos resultado de la consulta por pantalla
echo "<h2> Listado de jugadores </h2>";
// Mientras la consulta tenga filas
while ($fila = mysqli_fetch_array($resultado)) {
    // Sacamos los datos de la fila
    extract($fila);
    // Los mostramos por pantalla
    // Los nombres de las variables serán SIEMPRE
    // iguales a los nombres de los campos en la BBDD
    echo "$name, $birth, $nbaskets, $nassists, $nrebounds, $position, $team<br>";
}
//
//foreach ($resultado as $fila) {
//    foreach ($fila as $valor) {
//        echo "$valor";
//    }
//    echo "<br>";
//}

/*<h2>Ejemplo de tabla</h2>
        <table border =1>
            <tr>
            <th>nombre</th>
            <th>edad</th>
            </tr>
            <tr>
                <td>pepe</td>
                <td>34</td>
            </tr>
        </table>*/