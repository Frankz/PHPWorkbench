<?php
include_once "conection.php";

$c_host = "";
$c_user = "";
$c_pass = "";
$c_db = "";

// conecta y lanza un listado de la base de datos
$dbs = list_dbs($c_host, $c_user, $c_pass);
$tables = list_tables($c_host, $c_user, $c_pass, $c_db);
/*
echo "<pre>";
print_r($tables);
echo "</pre>";
*/
//echo "<select>";
/*
for ($i = 0;$i < count($tables);$i++) {
  $j = $i +1;
  echo $j . " " . $tables[$i] . "<br />";
}
*/
//echo "</select>";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="lib/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container theme-showcase" role="main">
    <!-- CUERPO DE LA PÁGINA -->
    <h1>PHP Workbench</h1>
    <div class="testing">
   
    <input type="submit" class="button" name="insert" value="insert" />
    <input type="submit" class="button" name="select" value="select" />
    <input type="submit" class="button" name="select" value="get_csv" />

    </div>
    <div class="databases">
    <h3>Databases</h3>
    <select>
      <?php
      
      for ($i=0;$i < count($dbs); $i++) {
        echo "<option>" . $dbs[$i] . "</option>";
      }
      
      ?>
    </select>
  </div>
  <div class="tables">
    <div class="col-sm-4">
      <div class="list-group">
        <?php

        for ($i=0;$i< count($tables); $i++) {
          $j = $i+1;
        echo '<a class="list-group-item" href="#">' . $j . '.- ' . $tables[$i] .'</a>';  
        }

        ?>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!-- ### CUERPO DE LA PÁGINA FIN ### -->
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.button').click(function(){
          var clickBtnValue = $(this).val();
          var ajaxurl = 'ajax.php',
          data =  {'action': clickBtnValue};
          /*$.post(ajaxurl, data, function (data) {
              // Response div goes here.
              //console.log(data.name);
              //JSON.stringify(response);
              //alert("action performed successfully");
          }, "json");*/
           $.post(ajaxurl, data, function (data) {
              // Response div goes here.
              console.log(data);
          });
      });

    });
    </script>
  </body>
</html>