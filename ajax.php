<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'insert':
            insert();
            break;
        case 'select':
            select();
            break;
        case 'get_csv':
            get_csv();
            break;    
    }
}

function select() {
    //echo "The select function is called.";
    //echo json_encode(array("name"=>"John","time"=>"2pm")); 

    //return $texto;
}

function insert() {
    echo "The insert function is called.";
    exit;
}

function get_csv($host = null,$user = null,$pass = null, $db = null) {
/*
Parámetros de conexión...
*/

$host = "";
$user = "";
$pass = "";
$db = "";

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