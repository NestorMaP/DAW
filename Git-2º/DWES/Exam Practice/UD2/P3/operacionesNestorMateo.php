<?php
    /**
     * @author NestorM
     * @version 30/11/2024
     */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 3</title>
</head>
<body>
    <h1>Mathematical operations</h1>
    <?php
        $n1 = rand(PHP_INT_MIN,PHP_INT_MAX);
        $n2 = rand(PHP_INT_MIN,PHP_INT_MAX);

        // Operations
        echo 'Sum of '.$n1.' + '.$n2.' = '.($n1+$n2).'<br';
        echo 'Sustraction of '.$n1.' - '.$n2.' = '.($n1-$n2).'<br';
        echo 'Multiplication of '.$n1.' * '.$n2.' = '.($n1*$n2).'<br';
        echo 'Division of '.$n1.' / '.$n2.' = '.($n1/$n2).'<br';
        echo 'Module of '.$n1.' % '.$n2.' = '.($n1%$n2).'<br';

        $comp = ($n1>$n2) ? 'The higher number is the FIRST: '.$n1.'.'
            : (($n1<$n2) ? 'The lower number is the SECOND: '.$n2.'.'
            : 'Both numbers are equal...'. $n1.' = '.$n2.'.');

        echo $comparison;
    ?>
    
</body>
</html>