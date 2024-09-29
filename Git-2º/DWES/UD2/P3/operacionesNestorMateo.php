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
    <title>Práctica 3</title>
</head>
<body>
    <h1>Operaciones</h1>
    <?php
        $n1 = rand(PHP_INT_MIN, PHP_INT_MAX);
        $n2 = rand(PHP_INT_MIN, PHP_INT_MAX);

        //SUMA
        echo 'Suma de '.$n1.' más '.$n2.'= '.($n1+$n2).'<br>';
        echo 'Resta de '.$n1.' menos '.$n2.'= '.($n1-$n2).'<br>';
        echo 'Multiplicación de '.$n1.' por '.$n2.'= '.($n1*$n2).'<br>';
        echo 'División de '.$n1.' entre '.$n2.'= '.($n1/$n2).'<br>';
        echo 'Módulo de '.$n1.' con '.$n2.'= '.($n1%$n2).'<br>';

        $comparison = ($n1>$n2) ? 'El número más grande es el PRIMERO: '.$n1.'.'
            : (($n1<$n2) ? 'El número más grande es el SEGUNDO: '.$n2.'.'
            : 'Ambos números son iguales... '.$n1.' = '.$n2.'.');
        
        echo $comparison;
    ?>
</body>
</html>