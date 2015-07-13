<?php
include_once "conection.php";

// conecta y lanza un listado de la base de datos
$dbs = list_dbs();

/*
echo "<pre>";
print_r($dbs);
echo "</pre>";
*/
//echo "<select>";

for ($i = 0;$i < count($dbs);$i++) {
	// $j = $i +1;
	// echo $j . " " . $dbs[$i] . "<br />";
	echo $dbs[$i];
}

//echo "</select>";
