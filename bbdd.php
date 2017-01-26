<?php

// Función que conecta con BBDD ------------------------------------- MODIFICADO
// Inserta un alumno con los valores que recibe como parámetros
// Cierra conexión con la bbdd
function insertarEquipo($name, $city, $creation) {
    // Conectamos a la bbdd, si no conecta interrumpe el programa
    $conexion = conectar("basket");

// Tenemos la conexión con la BBDD :)
// Preparamos el insert
    $insert = "insert into team 
         values('$name', '$city', $creation)";
    // Insertamos en la bbdd
    if (mysqli_query($conexion, $insert)) {
        // Ha ido todo bien
        echo "Equipo dado de alta<br>";
    } else {
        // Si hay error lo mostramos por pantalla
        echo mysqli_error($conexion);
    }
    // Desconectamos
    desconectar($conexion);
}
//-------------------------------------------------------------------


// Función que conecta con la bbdd que se pasa por 
// parámetro y devuelve la conexión
// Si hay error muestra msg de error y se interrumpe ejecución
function conectar($database) {
    $conexion = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $conexion;
}
//-----------------------------------------------------------------


// Función que cierra la conexión con la bbdd
function desconectar($conexion) {
    mysqli_close($conexion);
}

//-------------------------------------------------------------------

// Función que conecta con BBDD ------------------------------------- MODIFICADO
// Inserta un alumno con los valores que recibe como parámetros
// Cierra conexión con la bbdd
function insertarJugador($name, $birth, $nbaskets, $nassists, $nrebounds, $position, $team) {
    // Conectamos a la bbdd, si no conecta interrumpe el programa
    $conexion = conectar("basket");

// Tenemos la conexión con la BBDD :)
// Preparamos el insert
    $insert = "insert into player 
         values('$name', $birth, $nbaskets, $nassists, $nrebounds, '$position', '$team')";
    // Insertamos en la bbdd
    if (mysqli_query($conexion, $insert)) {
        // Ha ido todo bien
        echo "Jugador dado de alta<br>";
    } else {
        // Si hay error lo mostramos por pantalla
        echo mysqli_error($conexion);
    }
    // Desconectamos
    desconectar($conexion);
}

//------------------------------------------------------------------------------

// Función que devuelve los nombres de todos los jugadores
function selectNombresJugadores() {
    $con = conectar("basket");
    $query = "select name from player;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//-----------------------------------------------------------------------------

// Función que a partir del nombre de un jugador
// devuelve todos sus datos
function selectJugadorByNombre($name) {
    $con = conectar("basket");
    $query = "select * from player where name='$name';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//-----------------------------------------------------------------------------

// Función que conecta a la bbdd y devuelve 
// el resultado de ejecutar select * from player
function selectAllJugadores() {
    // conectamos con la bbdd
    $conexion = conectar("basket");
    // Ejecutamos la consulta recogiendo el resultado
    $resultado = mysqli_query($conexion, "select * from player");
    desconectar($conexion);
    return $resultado;
}

//-----------------------------------------------------------------------------

// Función que conecta a la bbdd y devuelve 
// el resultado de ejecutar select * from team
function selectAllEquipos() {
    // conectamos con la bbdd
    $conexion = conectar("basket");
    // Ejecutamos la consulta recogiendo el resultado
    $resultado = mysqli_query($conexion, "select * from team");
    desconectar($conexion);
    return $resultado;
}

//-----------------------------------------------------------------------------