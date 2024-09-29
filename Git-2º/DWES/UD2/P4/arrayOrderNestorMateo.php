<?php
/**
*@author NestorM
*@version 29/09/2024
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http_equiv="expires" content="Sat, 07 feb 2016 00:00:00 GMT">
    <title>Práctica 4</title>
</head>
<body>
    <h1>Array Sort</h1>
    <?php
        // Crear array y mostrarlo
        $array_length = rand(0,10);
        $array = [];
        for ($i=0; $i<$array_length; $i++) {
            $array[] = rand(0,100);
        }
        echo '<pre>'.print_r($array,true).'</pre>';

        // Ordenar de menor a mayor y mostrar
        for ($i= 1; $i<count($array); $i++) {
            if ($array[$i]<$array[$i-1]) {
                $temp = $array[$i-1];
                $array[$i-1] = $array[$i];
                $array[$i] = $temp;
                $i=0;
            }
        }
        echo '<pre>'.print_r($array,true).'</pre>';

    ?>
</body>
</html>