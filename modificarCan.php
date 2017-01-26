<?php

/* 
 * Fichero que mostrará listado de nombres de alumnos
 * para que el usuario escoja cuál quiere modificar
 */

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';

// Formulario para que escoja el alumno
echo "<form action='modificar.php' method='post'>";
echo "Selecciona el alumno a modificar: ";
echo "<select name='alumno'>";
// Leemos los nombres de la bbdd
$nombres = selectNombresAlumnos();
// Vamos extrayendo los nombres y añadiendolos a la lista
while ($fila=  mysqli_fetch_array($nombres)) {
    extract($fila);
    echo "<option value='$nombre'>$nombre</option>";
}
echo "</select>";
echo "<input type='submit' value='Seleccionar'>";
echo "</form>";

