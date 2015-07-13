<?php

/***********************************************************
	Lanza un listado de las bases de datos en el sistema
***********************************************************/

function list_dbs($host = null,$user = null,$pass = null) {
/*
Parámetros de conexión...
*/

// Query for list databases
$sqlShowDb = "SHOW DATABASES";

// Conexión
$link = mysqli_connect($host,$user,$pass) 
	or die("some error ocurred during connection " . mysqli_error($con));

// List Databases
$result = mysqli_query($link, $sqlShowDb);
if (!mysqli_query($link,$sqlShowDb)) {
	printf("Error: %s\n", mysqli_error($link));
}

/*
while($row = mysqli_fetch_row($result)):
        if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
            echo nl2br($row[0]."\r\n");

        }
endwhile;
*/

/* obtener el array asociativo */
while ($fila = mysqli_fetch_row($result)) {
	if (($fila[0]!="information_schema") && ($fila[0]!="mysql")) {
    	$dbs[] = $fila[0];
}
/* liberar el conjunto de resultados */
//mysqli_free_result($result);
}

/* cerrar la conexión */
mysqli_close($enlace);

return $dbs;
}

/***********************************************************
	lanza un listado de las tablas dentro de la base de datos
***********************************************************/

function list_tables($host = null,$user = null,$pass = null, $db = null) {
/*
Parámetros de conexión...
*/
/*
if ($db == null) {
	die("Debe seleccionar una base de datos...");
}
*/
// Query for list databases
$sql_tables = "SHOW TABLES FROM " . $db;

// Conexión
$link = mysqli_connect($host,$user,$pass,$db) or die("some error ocurred during connection " . mysqli_error($link));

// List Databases
$result = mysqli_query($link, $sql_tables);
if (!mysqli_query($link,$sql_tables)) {
	printf("Error: %s\n", mysqli_error($link));
}

/*
while($row = mysqli_fetch_row($result)):
        if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
            echo nl2br($row[0]."\r\n");

        }
endwhile;
*/

/* obtener el array asociativo */
while ($fila = mysqli_fetch_row($result)) {
    	$tables[] = $fila[0];
}
/* liberar el conjunto de resultados */
//mysqli_free_result($result);


/* cerrar la conexión */
mysqli_close($enlace);

return $tables;
}

/***********************************************************
	lanza un csv con los valores de la tabla solicitada
***********************************************************/
