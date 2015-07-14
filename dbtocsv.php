<?php
$data = array ('aaa,"bbb",ccc,dddd',
               '123,456,789',
               '"aaa","bbb"');

//    $val = $data[0];
//    echo 

$fp = fopen('data.csv', 'w')i;
//$fp = fopen('php://output','w');
//echo "<pre>";
    foreach($data as $line){
            $val = explode(",",$line);
            $val = str_replace('"','',$val);
            fputcsv($fp, $val,',','"');
            //print_r($val);
    }
fclose($fp);
//echo "</pre>";
?>
